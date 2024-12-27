<?php

/**
 * Fetch the recent activity of the specified GitHub user using the GitHub API
 */
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

/**
 * Get repository name from a specific GitHub event
 */
function repoName(array $event): string
{
  return $event['repo']['name'];
}

/**
 * Swap "create a repository" and "create the first branch" on the same repository
 */
function sortCreateEvent($a, $b): int
{
  if ($a['type'] == 'CreateEvent' && $b['type'] == 'CreateEvent') {
    $arn = repoName($a);
    $brn = repoName($b);
    $aprt = $a['payload']['ref_type'];
    $bprt = $b['payload']['ref_type'];

    return $arn == $brn && $aprt == 'repository' && $bprt == 'branch'
      ? 1
      : 0;
  }

  return 0;
}

/**
 * Generates a descriptive message for a "CommitCommentEvent" GitHub activity.
 */
function commitCommentEvent(array $event): string
{
  $action = $event['payload']['action'];
  $actor = $event['actor']['login'];
  $commit_id = $event['payload']['comment']['commit_id'];

  return "Commit comment $action by $actor on commit '$commit_id' in " . repoName($event);
}

/**
 * Generates a descriptive message for a "CreateEvent" GitHub activity.
 */
function createEvent(array $event): string
{
  $ref = $event['payload']['ref'];
  $refType = $event['payload']['ref_type'];
  $payloadRefType = $refType == 'repository'
    ? $refType
    : $refType . " [$ref] in";

  return "Created new $payloadRefType " . repoName($event);
}

/**
 * Generates a descriptive message for a "DeleteEvent" GitHub activity.
 */
function deleteEvent(array $event): string
{
  $ref = $event['payload']['ref'];
  $refType = $event['payload']['ref_type'];

  return "Deleted $refType [$ref] in " . repoName($event);
}

/**
 * Generates a descriptive message for a "ForkEvent" GitHub activity.
 */
function forkEvent(array $event): string
{
  $forkeeFullName = $event['payload']['forkee']['full_name'];

  return "Forked " . repoName($event) . " to $forkeeFullName";
}

/**
 * Generates a descriptive message for a "GollumEvent" GitHub activity.
 */
function gollumEvent(array $event): string
{
  $action = ucfirst($event['payload']['pages'][0]['action']);

  return "$action a wiki page in " . repoName($event);
}

function issueCommentEvent(array $event): string
{
  $action = ucfirst($event['payload']['action']);
  $issueNumber = $event['payload']['issue']['number'];

  return "$action comment on issue #$issueNumber in " . repoName($event);
}

/**
 * Generates a descriptive message for a "IssueEvent" GitHub activity.
 */
function issueEvent(array $event): string
{
  $action = ucfirst($event['payload']['action']);
  $payloadAction = $action == 'opened'
    ? $action . ' a new issue'
    : $action . ' an issue';

  return "$payloadAction in " . repoName($event);
}

/**
 * Generates a descriptive message for a "MemberEvet" GitHub activity.
 */
function memberEvent(array $event): string
{
  $action = ucfirst($event['payload']['action']);
  $member = $event['payload']['member']['login'];
  $message = $action == 'Added'
    ? 'as a collaborator to'
    : ($action == 'Edited'
      ? 'permissions as a collaborator in'
      : 'from as a collaborator from');

  return "$action $member $message " . repoName($event);
}

/**
 * Generates a descriptive message for a "PublicEvent" GitHub activity.
 */
function publicEvent(array $event): string
{
  return "Changed visibility to public for " . repoName($event);
}

/**
 * Generates a descriptive message for a "PullRequestEvent" GitHub activity.
 */
function pullRequestEvent(array $event): string
{
  $action = $event['payload']['action'];
  $number = $event['payload']['number'];
  $payloadAction = strpos($action, '_') != false
    ? ucfirst(str_replace('_', ' ', $action))
    : ucfirst($action);

  return "$payloadAction pull request #$number in " . repoName($event);
}

/**
 * Generates a descriptive message for a "PullRequestReviewEvent" GitHub activity.
 */
function pullRequestReviewEvent(array $event): string
{
  $actor = $event['actor']['login'];
  $action = $event['payload']['action'];
  $number = $event['payload']['pull_request']['number'];
  $opening = strpos($event['type'], 'Comment') !== false
    ? 'Review comment'
    : (strpos($event['type'], 'Thread') !== false
      ? 'Review thread'
      : 'Review');

  return "$opening $action by $actor for pull request #$number in " . repoName($event);
}

/**
 * Generates a descriptive message for a "PushEvent" GitHub activity.
 */
function pushEvent(array $event): string
{
  $size = $event['payload']['size'];
  $payloadSize = $size > 1
    ? $size . ' commits'
    : $size . ' commit';

  return "Pushed $payloadSize to " . repoName($event);
}

/**
 * Generates a descriptive message for a "ReleaseEvent" GitHub activity.
 */
function releaseEvent(array $event): string
{
  $action = ucfirst($event['payload']['action']);
  $tagName = $event['payload']['release']['tag_name'];
  $release = $action == 'Published'
    ? 'new release'
    : 'release';

  return "$action $release $tagName in " . repoName($event);
}

/**
 * Generates a descriptive message for a "SponsoshipEvent" GitHub activity.
 */
function sponsorshipEvent(array $event): string
{
  $action = ucfirst($event['payload']['action']);
  $actor = $event['actor']['login'];

  return "$action sponsorship by $actor in " . repoName($event);
}

/**
 * Generates a descriptive message for a "WatchEvent" GitHub activity.
 */
function watchEvent(array $event): string
{
  return "Starred " . repoName($event);
}

/** 
 * Generate guide for using PHP Github User Activity
 */
function help(): string
{
  $yellow = "\033[33m";
  $green = "\033[32m";
  $reset = "\033[0m";

  $help =
    $green . "\nPHP Github User Activity \n" . $reset . PHP_EOL .
    $yellow . 'Usage:' . $reset . " php github-activity.php <username>\n\n";

  return $help;
}
