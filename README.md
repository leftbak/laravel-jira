# Laravel5 Jira service

Easy access Jira rest api in Laravel5 - forked from [univerze/laravel-jira](https://github.com/univerze/larave-jira)

* [Installation and Requirements](#installation)
* [Searching issues](#searching)
* [Creating issues](#creating)
* [Editing issues](#editing)

<a name="installation"></a>
## Installation and Requirements

```sh
composer require leftbak/laravel-jira
```

Afterwards, run `composer update` from your command line.

Then, update `config/app.php` by adding an entry for the service provider.

```php
'providers' => [
    // ...
    Leftbak\Jira\JiraServiceProvider::class,
];

'aliases' => [
  	// ...
  	'Jira' => Leftbak\Jira\Facade\JiraFacade::class,
];
```

Finally, from the command line again, run `php artisan vendor:publish` to publish
the default configuration file to config/jira.php.

<a name="searching"></a>
## Searching issues

The search method will take the jql query string:

```php
$response = Jira::search( 'project = YourProject AND labels = somelabel' );
```

You can build and test the jql beforehand if you go to your Jira site Issues > Search for Issues > Advanced Search.

Further information can be found on [JIRA documentation - search issues](https://developer.atlassian.com/jiradev/jira-apis/jira-rest-apis/jira-rest-api-tutorials/jira-rest-api-example-query-issues)

> **NOTE** jql parameter is already included in the payload

<a name="creating"></a>
## Creating issues

```php
$issue = Jira::create( array(
    'project'     => array(
        'key' => 'YourProject'
    ),
    'summary'     => 'This is the summary',
    'description' => 'Description here',
    'issuetype'   => array(
        'name' => 'Bug'
    )
) );
```

Further information can be found on [JIRA documentation - create issue](https://developer.atlassian.com/jiradev/jira-apis/jira-rest-apis/jira-rest-api-tutorials/jira-rest-api-example-create-issue)

> **NOTE** fields parameter is already included in the payload

<a name="editing"></a>
## Editing issues

```php
Jira::update( 'ISSUE-1234', array(
    'description' => 'this is my new description'
) );
```

In this case the JIRA api will return "204 - No Content" instead of issue details.

Further information can be found on [JIRA documentation - edit issue](https://developer.atlassian.com/jiradev/jira-apis/jira-rest-apis/jira-rest-api-tutorials/jira-rest-api-example-edit-issues)

> **NOTE** fields parameter is already included in the payload

---

Released under the MIT License. See the LICENSE file for details.
