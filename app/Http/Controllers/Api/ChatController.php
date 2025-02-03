<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Conversations\Interface\ConversationServiceInterface;
use App\Models\Message;
use App\Models\Conversation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    protected $conversationServiceInterface;

    public function __construct(
        ConversationServiceInterface $conversationServiceInterface
    ) {
        
        $this->conversationServiceInterface = $conversationServiceInterface;
    }

    public function createConversation(Request $request)
    {
        try {
            $response = $this->conversationServiceInterface->generateResponse($request->prompt);

            return response()->json([
                'message' => 'Conversation created successfully',
                'response' => $response,
            ], Response::HTTP_CREATED);
        } catch (Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return response()->json([
                'message' => 'Failed to create conversation',
                'error' => $e->getMessage(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
