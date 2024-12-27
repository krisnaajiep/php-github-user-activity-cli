<?php

function getGithubEvents(string $username): string|array
{
  $ch = curl_init();
  $url = "https://api.github.com/users/{$username}/events";

  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'User-Agent: MyApp/1.0',
    'Accept: application/vnd.github+json',
    'X-GitHub-Api-Version: 2022-11-28',
  ]);

  $response = curl_exec($ch);
  $decode = json_decode($response, true);

  if (!$response) {
    $result = 'cURL Error: ' . curl_error($ch);
  } else {
    $status = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);

    $result = $status != 200
      ? 'Error ' . $status . ' (' . $decode['message'] . ')'
      : $decode;
  }

  curl_close($ch);

  return $result;
}
