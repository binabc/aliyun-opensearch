<?php

require_once "./vendor/autoload.php";

use OpenSearch\Client\OpenSearchClient;
use OpenSearch\Client\SearchClient;
use OpenSearch\Util\SearchParamsBuilder;

$accessKeyId = 'xxx';
$secret = 'bbb';
$endPoint = 'http://opensearch-cn-beijing.aliyuncs.com';
$appName = 'ccc';
$suggestName = '<suggest name>';
$options = array('debug' => true);

$client = new OpenSearchClient($accessKeyId, $secret, $endPoint, $options);

$searchClient = new SearchClient($client);
$params = new SearchParamsBuilder();
//设置config子句的start值
$params->setStart(0);
//设置config子句的hit值
$params->setHits(20);
// 指定一个应用用于搜索
$params->setAppName('ccc');
// 指定搜索关键词
$params->setQuery("default:'鱼'");
// 指定返回的搜索结果的格式为json
$params->setFormat("fulljson");
//添加排序字段
//params->addSort('RANK', SearchParamsBuilder::SORT_DECREASE);
// 执行搜索，获取搜索结果
$ret = $searchClient->execute($params->build());
// 将json类型字符串解码
print_r(json_decode($ret->result, true));
//打印调试信息
echo $ret->traceInfo->tracer;