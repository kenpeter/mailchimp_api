<?php

// name space
namespace Classy;

// psr interface
use Psr\Http\Message\ResponseInterface;


// we have get, head, put, post, patch, delete.....
/**
 * Class MailChimpClient
 * @package App\Services
 *
 * Simple php client to request mailchimp API 3.0.
 *
 * @method ResponseInterface get($uri, array $options = [])
 * @method ResponseInterface head($uri, array $options = [])
 * @method ResponseInterface put($uri, array $options = [])
 * @method ResponseInterface post($uri, array $options = [])
 * @method ResponseInterface patch($uri, array $options = [])
 * @method ResponseInterface delete($uri, array $options = [])

 */
class MailchimpClient
{
  // private client
  /**
   * @var \GuzzleHttp\Client
   */
  private $client;
  private $config;


  // we have api key and config
  /**
   * @param $api_key
   * @param array $options Accept same options as Guzzle constructor
   */
  public function __construct($api_key, array $config = [])
  {
    // api key must be string
    if (!is_string($api_key)) {
      throw new \Exception("api_key must be a string");
    }

    // api key contains dash
    if (strpos($api_key, '-') === false) {
      throw new \Exception("api_key $api_key is invalid");
    }

    // get api key and server name
    list($key, $dc) = explode('-', $api_key);

    // has base_uri and auth options
    // also merge with previous $config
    $this->config = array_merge($config, [
      'base_uri' => "https://$dc.api.mailchimp.com/3.0/",
      'auth' => ['apikey', $key],
    ]);

    // build the actual guzzle client
    $this->client = new \GuzzleHttp\Client($this->config);
  }

  /**
   * Shortcut.
   *
   * @param $uri
   * @param array $options
   * @return mixed
   */
  public function getData($uri, $options = [])
  {
    $res = $this->client->request('GET', $uri);

    // test
    //echo $res->getStatusCode();
    // "200"
    //print_r( $res->getHeader('content-type') );
    // 'application/json; charset=utf8'

    // encode to pass string around.
    // decode means decode the string.
    // now after json_decode, it becomes obj.....
    // so can use print_r
    // print_r( json_decode($mybody) );

    // $mybody is json string......
    return $data = $res->getBody();
  }

  /**
   * Perform a request
   *
   * @param $method
   * @param string $uri
   * @param array $options
   * @return mixed|ResponseInterface
   */
  public function request($method, $uri = '', array $options = [])
  {
    return $this->client->request($method, $uri, $options);
  }

  /**
   * Forward any other call to guzzle client.
   *
   * @param  string  $method
   * @param  array  $parameters
   * @return mixed
   */
  public function __call($method, $parameters)
  {
    return call_user_func_array([$this->client, $method], $parameters);
  }
}
