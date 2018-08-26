<?php
namespace App\Service;
use Aws\S3\S3Client as Client;

class S3
{
    private $client, $s3Key, $s3Secret, $s3Path, $bucketName, $s3Region, $s3Version;
    public function __construct($s3Key, $s3Secret, $s3Path, $bucketName, $s3Region, $s3Version){
        $this->s3Key = $s3Key;
        $this->s3Secret = $s3Secret;
        $this->s3Path = $s3Path;
        $this->bucketName = $bucketName;
        $this->s3Region = $s3Region;
        $this->s3Version = $s3Version;
        
        $this->client = new Client([
            'version' => $this->s3Version,
            'region'  => $this->s3Region,
            'credentials' => [
                'key' => $this->s3Key,
                'secret' => $this->s3Secret,
            ]
        ]);
    }
    // remove this eventually
    public function setClient() {
        $this->client = new Client([
            'credentials' => [
                'key' => $this->s3Key,
                'secret' => $this->s3Secret,
            ]
        ]);
    }
    private function getClient() {
        return $this->client;
    }
    public function CheckS3FileExists($name){
        $existingImage = $this->getClient()->listObjects([
            'Bucket' => $this->bucketName,
            'Prefix' => $name
        ]);
        if ($existingImage->get("Contents") == null)
            return null;
        foreach ($existingImage->get("Contents") as $hit){
            if ($hit["Key"] == $name)
                return $this->s3Path . $name;
        }
        return null;
    }
    public function PutS3File($data, $name, $mimeType = null){
        $params = [
            'Bucket' => $this->bucketName,
            'Key'    => $name,
            'Body'   => $data,
            'ACL'    => 'public-read'
        ];
        if ($mimeType != null)
            $params["ContentType"] = $mimeType;
        $this->getClient()->putObject($params);
        return $this->s3Path . $name;
    }
    public function Delete($name) {
        $params = array(
            'Bucket' => $this->bucketName,
            'Key' => $name
        );
        $this->getClient()->deleteObject($params);
    }
}