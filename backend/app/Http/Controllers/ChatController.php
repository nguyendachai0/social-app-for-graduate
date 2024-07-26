<?php

namespace App\Http\Controllers;

use App\Jobs\SendMessage;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $messageContent = $request->input('message_content');
        $participantIds  = $request->input('participants');
        $user = Auth::user();

        $conversationIds = Conversation::select('conversations.id')
            ->join('participants', 'conversations.id', '=', 'participants.conversation_id')
            ->whereIn('participants.profile_user_id', $participantIds)
            ->groupBy('conversations.id')
            ->havingRaw('COUNT(DISTINCT participants.profile_user_id) = ?', [count($participantIds)])
            ->pluck('conversations.id');

        $conversation = Conversation::find($conversationIds->first());
        if (!$conversation) {
            $conversation = Conversation::create();
            foreach ($participantIds as $participantId) {
                Participant::create([
                    'conversation_id' => $conversation->id,
                    'profile_user_id' => $participantId,
                    'joined_at' => now()
                ]);
            }
        }
        // Foreach participantsId here create Message
        $message = Message::create([
            'conversation_id' => $conversation->id,
            'sender_id' => $user->id,
            'message_content' => $messageContent
        ]);
        SendMessage::dispatch($message);
        return response()->json(['status' => 'Message Sent!', 'conversation_id' => $conversation->id]);
    }
}
