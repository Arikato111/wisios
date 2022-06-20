<?php
/*  * Copyright (c) 2022 ณวสันต์ วิศิษฏ์ศิงขร
    *
    * This source code is licensed under the MIT license found in the
    * LICENSE file in the root directory of this source tree.
*/
return new class
{
    public $Url = '';

    public function baseUrl($baseUrl)
    {
        $this->Url = $baseUrl;
    }
    public function Route($method, $url, $data = false, $header = false)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->Url . $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        if ($data) {
            if (gettype($data) == 'array') {
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            } else {
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            }
        }
        if ($header) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }
        $value = curl_exec($ch);
        if ($e = curl_error($ch)) {
            curl_close($ch);
            return $e;
        } else {
            curl_close($ch);
            return $value;
        }
    }

    public function get($url, $data = false, $header = false)
    {
        return $this->Route('GET', $url, $data, $header);
    }
    public function post($url, $data = false, $header = false)
    {
        return $this->Route('POST', $url, $data, $header);
    }
    public function put($url, $data = false, $header = false)
    {
        return $this->Route('PUT', $url, $data, $header);
    }
    public function delete($url, $data = false, $header = false)
    {
        return $this->Route('DELETE', $url, $data, $header);
    }
};
