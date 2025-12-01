<?php

namespace Crmeb\Yihaotong\Application;

use Crmeb\Yihaotong\AccessToken;
use GuzzleHttp\Exception\GuzzleException;
use Psr\SimpleCache\InvalidArgumentException;

/**
 * 电子签
 * Class SignatureClient
 */
class SignatureClient
{
    // 获取模板列表
    const DESCRIBE_TEMPLATES = 'v2/signature/describe_templates';
    // 上传文件
    const UPLOAD_FILE = 'v2/signature/upload_file';
    // 转换任务
    const CONVERT_TASK = 'v2/signature/convert_task';
    // 获取操作员列表
    const OPERATOR_LIST = 'v2/signature/operator_list';
    // 操作员角色
    const  OPERATOR_ROLE = 'v2/signature/operator_role';
    // 添加操作员
    const ADD_OPERATOR = 'v2/signature/operator';
    // 删除操作员
    const DELETE_OPERATOR = 'v2/signature/delete_operator/{id}';
    // 创建电子签订单
    const  CREATE_SIGNATURE_ORDER = 'v2/signature/create_signature_order';
    // 创建签署流程，返回签署地址
    const CREATE_FLOW_BY_FILE_DIRECTLY = 'v2/signature/create_flow_by_file_directly';
    // 取消签署流程
    const CANCEL_FLOW = 'v2/signature/cancel_flow';

    /**
     * @var AccessToken
     */
    protected $client;

    /**
     * InvoiceClient constructor.
     * @param AccessToken $accessToken
     */
    public function __construct(AccessToken $accessToken)
    {
        $this->client = $accessToken;
    }

    /**
     * 获取模板列表
     * @param int $page
     * @param int $limit
     * @param string $templateId
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function describeTemplates(int $page = 1, int $limit = 10, string $templateId = '')
    {
        return $this->client->request(self::DESCRIBE_TEMPLATES, 'get', [
            'page'        => $page,
            'limit'       => $limit,
            'template_id' => $templateId,
        ]);
    }

    /**
     * 上传文件
     * @param string $fileName
     * @param string $baseContent
     * @param string $fileMd5
     * @return mixed
     * @throws GuzzleException
     * @throws InvalidArgumentException
     */
    public function uploadFile(string $fileName, string $baseContent, string $fileMd5)
    {
        return $this->client->request(self::UPLOAD_FILE, 'post', [
            'file_name'      => $fileName,
            'base64_content' => $baseContent,
            'file_md5'       => $fileMd5,
        ]);
    }

    /**
     * 转换任务
     * @param string $taskId
     * @return mixed
     * @throws GuzzleException
     * @throws InvalidArgumentException
     */
    public function getConvertTask(string $taskId)
    {
        return $this->client->request(self::CONVERT_TASK, 'get', [
            'task_id' => $taskId,
        ]);
    }

    /**
     * 获取操作员列表
     * @param int $page
     * @param int $limit
     * @param string $operatorId
     * @return mixed
     * @throws GuzzleException
     * @throws InvalidArgumentException
     */
    public function getOperatorList(int $page = 1, int $limit = 10, string $userName = '')
    {
        return $this->client->request(self::OPERATOR_LIST, 'get', [
            'page'      => $page,
            'limit'     => $limit,
            'user_name' => $userName,
        ]);
    }

    /**
     * 操作员角色
     * @return mixed
     * @throws GuzzleException
     * @throws InvalidArgumentException
     */
    public function getOperatorRole()
    {
        return $this->client->request(self::OPERATOR_ROLE, 'get');
    }

    /**
     * 添加操作员
     * @param string $userName
     * @param string $mobile
     * @param array $role
     * @param string $email
     * @return mixed
     * @throws GuzzleException
     * @throws InvalidArgumentException
     */
    public function addOperator(string $userName, string $mobile, array $role, string $email = '')
    {
        return $this->client->request(self::ADD_OPERATOR, 'post', [
            'user_name' => $userName,
            'mobile'    => $mobile,
            'email'     => $email,
            'role'      => $role,
        ]);
    }

    /**
     * 删除操作员
     * @param string $id
     * @return mixed
     * @throws GuzzleException
     * @throws InvalidArgumentException
     */
    public function deleteOperator(string $id)
    {
        return $this->client->setParameValue('id', $id)->request(self::DELETE_OPERATOR, 'post');
    }

    /**
     * 创建电子签订单
     * @param string $flowName
     * @param string $flowDescription
     * @return mixed
     * @throws GuzzleException
     * @throws InvalidArgumentException
     */
    public function createSignatureOrder(string $flowName, string $flowDescription)
    {
        return $this->client->request(self::CREATE_SIGNATURE_ORDER, 'post', [
            'flow_name'        => $flowName,
            'flow_description' => $flowDescription,
        ]);
    }

    /**
     * 创建签署流程，返回签署地址
     * @param string $signatureSn
     * @param string $channelType
     * @param string $fileId
     * @param string $userid
     * @param array $approvers
     * @return mixed
     * @throws GuzzleException
     * @throws InvalidArgumentException
     */
    public function createFlowByFileDirectly(string $signatureSn, string $channelType, string $fileId, string $userid, array $approvers)
    {
        return $this->client->request(self::CREATE_FLOW_BY_FILE_DIRECTLY, 'post', [
            'signature_sn' => $signatureSn,
            'channel_type' => $channelType,
            'file_id'      => $fileId,
            'userid'       => $userid,
            'approvers'    => $approvers,
        ]);
    }

    /**
     * 取消签署流程
     * @param string $signatureSn
     * @param string $cancelMessage
     * @return mixed
     * @throws GuzzleException
     * @throws InvalidArgumentException
     */
    public function cancelFlow(string $signatureSn, string $cancelMessage)
    {
        return $this->client->request(self::CANCEL_FLOW, 'post', [
            'signature_sn'   => $signatureSn,
            'cancel_message' => $cancelMessage,
        ]);
    }

}