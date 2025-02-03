<?php

namespace App\Services\Conversations\Service;

use App\Repositories\Conversations\Interface\ConversationInterface;
use App\Services\Base\BaseService;
use App\Services\Conversations\Interface\ConversationServiceInterface;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Facades\Log;

class ConversationService extends BaseService implements ConversationServiceInterface
{
    public function getRepository()
    {
        return ConversationInterface::class;
    }

    public function generateResponse($message)
    {
        try {
            $customResponses = [
                'Ai tạo ra bạn' => 'Tôi được phát triển bởi Trần Việt Anh, chuyên code thuê đồ án, bán giày giá rẻ nhất "ĐAN PHƯỢNG"',
                'Ai tạo ra mày' => 'Tôi được phát triển bởi Trần Việt Anh, chuyên code thuê đồ án, bán giày giá rẻ nhất "ĐAN PHƯỢNG"',
                'Ai là người tạo ra bạn' => 'Tôi được phát triển bởi Trần Việt Anh, chuyên code thuê đồ án, bán giày giá rẻ nhất "ĐAN PHƯỢNG"',
                'Ai là người tạo ra mày' => 'Tôi được phát triển bởi Trần Việt Anh, chuyên code thuê đồ án, bán giày giá rẻ nhất "ĐAN PHƯỢNG"',
                'Who created you?' => 'Tôi được phát triển bởi Trần Việt Anh, chuyên code thuê đồ án, bán giày giá rẻ nhất "ĐAN PHƯỢNG"',
            ];

            if (array_key_exists($message, $customResponses)) {
                return $customResponses[$message];
            }

            $response = OpenAI::chat()->create([
                'model' => 'gpt-4o-mini',
                'messages' => [
                    ['role' => 'user', 'content' => $message],
                ],
            ]);

            if (isset($response['choices'][0]['message']['content'])) {
                return $response['choices'][0]['message']['content'];
            } else {
                return 'Sorry, I encountered an error. Please try again.';
            }
        } catch (\Exception $e) {
            return 'Sorry, I encountered an error. Please try again.' . $e->getMessage();
        }
    }
}
