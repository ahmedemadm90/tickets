<?php

namespace App\Http\Controllers;

use App\Mail\NewTicketMail;
use App\Models\Camera;
use App\Models\Ticket;
use App\Models\TicketComment;
use App\Models\User;
use App\Notifications\NewTicket;
use App\Notifications\NewTicketMail as NotificationsNewTicketMail;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class TicketController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Tickets List|Tickets Create|Tickets Edit|Tickets Delete|Tickets Show|Tickets Comment|Tickets Comment|Tickets Closed', ['only' => ['index', 'store']]);
        $this->middleware('permission:Tickets List', ['only' => ['index']]);
        $this->middleware('permission:Tickets Create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Tickets Edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Tickets Destroy', ['only' => ['destroy']]);
        $this->middleware('permission:Tickets Show', ['only' => ['show']]);
        $this->middleware('permission:Tickets Comment', ['only' => ['comment']]);
        $this->middleware('permission:Tickets Close', ['only' => ['close']]);
        $this->middleware('permission:Tickets Closed', ['only' => ['closed']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tickets = Ticket::where('state','open')->paginate(50);
        return view('tickets.index', compact('tickets'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cameras = Camera::get();
        return view('tickets.create', compact('cameras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $existed = [];
        $input = $request->all();
        $request->validate([
            'camera_id' => 'required',
            'details' => 'required',
        ]);
        foreach ($request->camera_id as $id) {
            $ticket = Ticket::where('camera_id',$id)->where('state','!=','closed')->first();
            if(!$ticket){
                $input['camera_id'] = $id;
                $input['details'] = $request->details;
                $newticket = Ticket::create($input);
                $ticket_id = $newticket->id;
                $user = User::where('email', 'abdelrahman.hashem@cemex.com')->first();
                FacadesNotification::send($user,new NewTicket($ticket_id));
            }else{
                $camera = Camera::find($id);
                array_push($existed,$camera->code);
            }
        }
        if (!empty($existed)) {
            return redirect(route('tickets.index'))->with(['success' => 'Some Of Your Cameras Already Has an Open Tickets']);
        }else{
            return redirect(route('tickets.index'))->with(['success' => 'Ticket Created Successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::find($id);
        /* $comments = TicketComment::where('ticket_id',$ticket->id) */
        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cameras = Camera::get();
        $ticket = Ticket::find($id);
        return view('tickets.edit', compact('ticket', 'cameras'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ticket = Ticket::find($id);
        $request->validate([
            'camera_id' => 'required',
            'details' => 'required',
        ]);
        $ticket->update($request->all());
        return redirect(route('tickets.index'))->with(['success' => 'updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $ticket = Ticket::find($id);
            $ticket->delete();
            return redirect(route('tickets.index'))->with(['success' => 'deleted successfully']);
        } catch (\Throwable $th) {
            return redirect(route('tickets.index'))->with(['error' => 'Pleace Contact With System Admin To Process Your Request']);
        }

    }
    public function comment(Request $request, $id)
    {
        $ticket = Ticket::find($id);
        if ($ticket) {
            $input['ticket_id'] = $ticket->id;
            $input['user_id'] = Auth::user()->id;
            $input['comment'] = $request->comment;
        }
        //dd($input);
        TicketComment::create($input);
        return redirect(route('tickets.index'))->with(['success'=>'Comment Added Successfully']);
    }
    public function close($id)
    {
        $ticket = Ticket::find($id);
        $ticket->update([
            'state'=>'closed',
            'closed_by'=>Auth::user()->id,
        ]);
        return redirect(route('tickets.index'))->with(['success'=>'Comment Added Successfully']);
    }
    public function closed(Request $request)
    {
        $tickets = Ticket::where('state','closed')->paginate(50);
        return view('tickets.closed',compact('tickets'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function closedSearch(Request $request)
    {
        $tickets = Ticket::where('id', $request['keywords'])
            ->orderBy('updated_at')->paginate(50);
        return view('tickets.closedresults', compact('tickets'))->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function ticketsSearch(Request $request)
    {
        //dd($request->all());
        $tickets = Ticket::where('id', $request->keyword)->orderBy('updated_at')->paginate(50);
        return view('tickets.searchresults', compact('tickets'))->with('i', ($request->input('page', 1) - 1) * 5);
    }
}
