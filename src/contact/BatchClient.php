<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/17
 * Time: 20:33
 */

namespace cdcchen\wechat\work\contact;


use cdcchen\wework\base\BaseClient;
use cdcchen\wework\base\CallbackCredential;
use cdcchen\wework\contact\GetAsyncJobResultRequest;
use cdcchen\wework\contact\ReplaceDepartmentRequest;
use cdcchen\wework\contact\ReplaceUserRequest;
use cdcchen\wework\contact\SyncUserRequest;

/**
 * Class BatchClient
 * @package cdcchen\wechat\work\contact
 */
class BatchClient extends BaseClient
{
    /**
     * @param string $jobId
     * @return array
     */
    public function getJobResult(string $jobId): array
    {
        return $this->send((new GetAsyncJobResultRequest())->setJobId($jobId));
    }

    /**
     * @param string $mediaId
     * @param CallbackCredential $credential
     * @return string
     */
    public function syncUser(string $mediaId, CallbackCredential $credential): string
    {
        return $this->send((new SyncUserRequest())->setMediaId($mediaId)->setCallback($credential));
    }

    /**
     * @param string $mediaId
     * @param CallbackCredential $credential
     * @return string
     */
    public function replaceUser(string $mediaId, CallbackCredential $credential): string
    {
        return $this->send((new ReplaceUserRequest())->setMediaId($mediaId)->setCallback($credential));
    }

    /**
     * @param string $mediaId
     * @param CallbackCredential $credential
     * @return string
     */
    public function replaceDepartment(string $mediaId, CallbackCredential $credential): string
    {
        return $this->send((new ReplaceDepartmentRequest())->setMediaId($mediaId)->setCallback($credential));
    }
}