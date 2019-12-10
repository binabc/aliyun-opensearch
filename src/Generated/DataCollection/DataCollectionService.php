<?php
namespace OpenSearch\Generated\DataCollection;
/**
 * Autogenerated by Thrift Compiler (0.9.3)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;


interface DataCollectionServiceIf {
  /**
   * @param string $docJson
   * @param string $searchAppName
   * @param string $dataCollectionName
   * @param string $dataCollectionType
   * @return \Generated\Common\OpenSearchResult
   * @throws \Generated\Common\OpenSearchException
   * @throws \Generated\Common\OpenSearchClientException
   */
  public function push($docJson, $searchAppName, $dataCollectionName, $dataCollectionType);
}

class DataCollectionServiceClient implements \OpenSearch\Generated\DataCollection\DataCollectionServiceIf {
  protected $input_ = null;
  protected $output_ = null;

  protected $seqid_ = 0;

  public function __construct($input, $output=null) {
    $this->input_ = $input;
    $this->output_ = $output ? $output : $input;
  }

  public function push($docJson, $searchAppName, $dataCollectionName, $dataCollectionType)
  {
    $this->send_push($docJson, $searchAppName, $dataCollectionName, $dataCollectionType);
    return $this->recv_push();
  }

  public function send_push($docJson, $searchAppName, $dataCollectionName, $dataCollectionType)
  {
    $args = new \DataCollectionService_push_args();
    $args->docJson = $docJson;
    $args->searchAppName = $searchAppName;
    $args->dataCollectionName = $dataCollectionName;
    $args->dataCollectionType = $dataCollectionType;
    $bin_accel = ($this->output_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
    if ($bin_accel)
    {
      thrift_protocol_write_binary($this->output_, 'push', TMessageType::CALL, $args, $this->seqid_, $this->output_->isStrictWrite());
    }
    else
    {
      $this->output_->writeMessageBegin('push', TMessageType::CALL, $this->seqid_);
      $args->write($this->output_);
      $this->output_->writeMessageEnd();
      $this->output_->getTransport()->flush();
    }
  }

  public function recv_push()
  {
    $bin_accel = ($this->input_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary');
    if ($bin_accel) $result = thrift_protocol_read_binary($this->input_, '\DataCollectionService_push_result', $this->input_->isStrictRead());
    else
    {
      $rseqid = 0;
      $fname = null;
      $mtype = 0;

      $this->input_->readMessageBegin($fname, $mtype, $rseqid);
      if ($mtype == TMessageType::EXCEPTION) {
        $x = new TApplicationException();
        $x->read($this->input_);
        $this->input_->readMessageEnd();
        throw $x;
      }
      $result = new \DataCollectionService_push_result();
      $result->read($this->input_);
      $this->input_->readMessageEnd();
    }
    if ($result->success !== null) {
      return $result->success;
    }
    if ($result->error !== null) {
      throw $result->error;
    }
    if ($result->e !== null) {
      throw $result->e;
    }
    throw new \Exception("push failed: unknown result");
  }

}

// HELPER FUNCTIONS AND STRUCTURES

class DataCollectionService_push_args {
  static $_TSPEC;

  /**
   * @var string
   */
  public $docJson = null;
  /**
   * @var string
   */
  public $searchAppName = null;
  /**
   * @var string
   */
  public $dataCollectionName = null;
  /**
   * @var string
   */
  public $dataCollectionType = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'docJson',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'searchAppName',
          'type' => TType::STRING,
          ),
        3 => array(
          'var' => 'dataCollectionName',
          'type' => TType::STRING,
          ),
        4 => array(
          'var' => 'dataCollectionType',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['docJson'])) {
        $this->docJson = $vals['docJson'];
      }
      if (isset($vals['searchAppName'])) {
        $this->searchAppName = $vals['searchAppName'];
      }
      if (isset($vals['dataCollectionName'])) {
        $this->dataCollectionName = $vals['dataCollectionName'];
      }
      if (isset($vals['dataCollectionType'])) {
        $this->dataCollectionType = $vals['dataCollectionType'];
      }
    }
  }

  public function getName() {
    return 'DataCollectionService_push_args';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->docJson);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->searchAppName);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->dataCollectionName);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 4:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->dataCollectionType);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('DataCollectionService_push_args');
    if ($this->docJson !== null) {
      $xfer += $output->writeFieldBegin('docJson', TType::STRING, 1);
      $xfer += $output->writeString($this->docJson);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->searchAppName !== null) {
      $xfer += $output->writeFieldBegin('searchAppName', TType::STRING, 2);
      $xfer += $output->writeString($this->searchAppName);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->dataCollectionName !== null) {
      $xfer += $output->writeFieldBegin('dataCollectionName', TType::STRING, 3);
      $xfer += $output->writeString($this->dataCollectionName);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->dataCollectionType !== null) {
      $xfer += $output->writeFieldBegin('dataCollectionType', TType::STRING, 4);
      $xfer += $output->writeString($this->dataCollectionType);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class DataCollectionService_push_result {
  static $_TSPEC;

  /**
   * @var \Generated\Common\OpenSearchResult
   */
  public $success = null;
  /**
   * @var \Generated\Common\OpenSearchException
   */
  public $error = null;
  /**
   * @var \Generated\Common\OpenSearchClientException
   */
  public $e = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        0 => array(
          'var' => 'success',
          'type' => TType::STRUCT,
          'class' => '\Generated\Common\OpenSearchResult',
          ),
        1 => array(
          'var' => 'error',
          'type' => TType::STRUCT,
          'class' => '\Generated\Common\OpenSearchException',
          ),
        2 => array(
          'var' => 'e',
          'type' => TType::STRUCT,
          'class' => '\Generated\Common\OpenSearchClientException',
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['success'])) {
        $this->success = $vals['success'];
      }
      if (isset($vals['error'])) {
        $this->error = $vals['error'];
      }
      if (isset($vals['e'])) {
        $this->e = $vals['e'];
      }
    }
  }

  public function getName() {
    return 'DataCollectionService_push_result';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 0:
          if ($ftype == TType::STRUCT) {
            $this->success = new \Generated\Common\OpenSearchResult();
            $xfer += $this->success->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 1:
          if ($ftype == TType::STRUCT) {
            $this->error = new \Generated\Common\OpenSearchException();
            $xfer += $this->error->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRUCT) {
            $this->e = new \Generated\Common\OpenSearchClientException();
            $xfer += $this->e->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('DataCollectionService_push_result');
    if ($this->success !== null) {
      if (!is_object($this->success)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('success', TType::STRUCT, 0);
      $xfer += $this->success->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->error !== null) {
      $xfer += $output->writeFieldBegin('error', TType::STRUCT, 1);
      $xfer += $this->error->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->e !== null) {
      $xfer += $output->writeFieldBegin('e', TType::STRUCT, 2);
      $xfer += $this->e->write($output);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

