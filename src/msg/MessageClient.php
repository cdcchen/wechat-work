<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/17
 * Time: 20:34
 */

namespace cdcchen\wework\msg;


use cdcchen\wework\base\BaseClient;

/**
 * Class MessageClient
 * @package cdcchen\wework\msg
 */
class MessageClient extends BaseClient
{
    /**
     * @param int $agentId
     * @param string $content
     * @param array|null $toUser
     * @param array|null $toDepart
     * @param array|null $toTag
     * @return array
     */
    public function sendText(
        int $agentId,
        string $content,
        array $toUser = null,
        array $toDepart = null,
        array $toTag = null
    ): array {
        $message = (new TextMessage())->setContent($content);
        return $this->sendMessage($agentId, $message, $toUser, $toDepart, $toTag);
    }

    /**
     * @param int $agentId
     * @param string $mediaId
     * @param array|null $toUser
     * @param array|null $toDepart
     * @param array|null $toTag
     * @return array
     */
    public function sendImage(
        int $agentId,
        string $mediaId,
        array $toUser = null,
        array $toDepart = null,
        array $toTag = null
    ): array {
        $message = (new ImageMessage())->setMediaId($mediaId);
        return $this->sendMessage($agentId, $message, $toUser, $toDepart, $toTag);
    }

    /**
     * @param int $agentId
     * @param string $mediaId
     * @param array|null $toUser
     * @param array|null $toDepart
     * @param array|null $toTag
     * @return array
     */
    public function sendVoice(
        int $agentId,
        string $mediaId,
        array $toUser = null,
        array $toDepart = null,
        array $toTag = null
    ): array {
        $message = (new VoiceMessage())->setMediaId($mediaId);
        return $this->sendMessage($agentId, $message, $toUser, $toDepart, $toTag);
    }

    /**
     * @param int $agentId
     * @param string $mediaId
     * @param string|null $title
     * @param string|null $description
     * @param array|null $toUser
     * @param array|null $toDepart
     * @param array|null $toTag
     * @return array
     */
    public function sendVideo(
        int $agentId,
        string $mediaId,
        string $title = null,
        string $description = null,
        array $toUser = null,
        array $toDepart = null,
        array $toTag = null
    ): array {
        $message = (new VideoMessage())->setVideo($mediaId, $title, $description);
        return $this->sendMessage($agentId, $message, $toUser, $toDepart, $toTag);
    }

    /**
     * @param int $agentId
     * @param string $mediaId
     * @param array|null $toUser
     * @param array|null $toDepart
     * @param array|null $toTag
     * @return array
     */
    public function sendFile(
        int $agentId,
        string $mediaId,
        array $toUser = null,
        array $toDepart = null,
        array $toTag = null
    ): array {
        $message = (new FileMessage())->setMediaId($mediaId);
        return $this->sendMessage($agentId, $message, $toUser, $toDepart, $toTag);
    }

    /**
     * @param int $agentId
     * @param TextCard $card
     * @param array|null $toUser
     * @param array|null $toDepart
     * @param array|null $toTag
     * @return array
     */
    public function sendTextCard(
        int $agentId,
        TextCard $card,
        array $toUser = null,
        array $toDepart = null,
        array $toTag = null
    ): array {
        $message = (new TextCardMessage())->setCard($card);
        return $this->sendMessage($agentId, $message, $toUser, $toDepart, $toTag);
    }

    /**
     * @param int $agentId
     * @param NewsArticle[] $articles
     * @param array|null $toUser
     * @param array|null $toDepart
     * @param array|null $toTag
     * @return array
     */
    public function sendNews(
        int $agentId,
        array $articles,
        array $toUser = null,
        array $toDepart = null,
        array $toTag = null
    ): array {
        $message = (new NewsMessage())->setArticles($articles);
        return $this->sendMessage($agentId, $message, $toUser, $toDepart, $toTag);
    }

    /**
     * @param int $agentId
     * @param MPNewsArticle[] $articles
     * @param array|null $toUser
     * @param array|null $toDepart
     * @param array|null $toTag
     * @return array
     */
    public function sendMPNews(
        int $agentId,
        array $articles,
        array $toUser = null,
        array $toDepart = null,
        array $toTag = null
    ): array {
        $message = (new MPNewsMessage())->setArticles($articles);
        return $this->sendMessage($agentId, $message, $toUser, $toDepart, $toTag);
    }

    /**
     * @param int $agentId
     * @param Message $message
     * @param array|null $toUser
     * @param array|null $toDepart
     * @param array|null $toTag
     * @return array
     */
    public function sendMessage(
        int $agentId,
        Message $message,
        array $toUser = null,
        array $toDepart = null,
        array $toTag = null
    ): array {
        $message->setAgentId($agentId);

        if ($toUser !== null) {
            $message->setToUser($toUser);
        }
        if ($toDepart !== null) {
            $message->setToParty($toDepart);
        }
        if ($toTag !== null) {
            $message->setToTag($toTag);
        }

        $request = (new SendMessageRequest())->setMessage($message);

        return $this->send($request);
    }
}