![Laravel ChatGPT Cover](https://raw.githubusercontent.com/hesamzakerirad/laravel-chatgpt/main/media/cover.png "Laravel ChatGPT Cover")

# Laravel ChatGPT
Bring ChatGPT to your Laravel application with a few simple steps!

## How to install it?
Take these steps to install ChatGPT.

### Step #1
Install the package using Composer.

```php
composer require hesamrad/laravel-chatgpt
```

### Step #2
Publish congifuration file.

```
php artisan vendor:publish --provider="HesamRad\LaravelChatGpt\LaravelChatGptServiceProvider" --tag="chatgpt-config"
```

### Step #3
Generate an API key inside your OpenAI account, and copy it into your .env file. (Generate your own API key.)

```
CHATGPT_API_KEY="xx-xxxx"
```

And that's it! You now have ChatGPT inside your application.

---

## How to use it?
It really is up to you! You could use the built-in routes to ask your questions, or even use the global helper function inside your controllers to do the job.

### Method #1 - Using built-in routes.
The package comes with a built-in route so you can send a request from anywhere inside your client application; whether it's a separate JavaScript-powered front-end, or anything else.

Simply send a `POST` request to `/api/chatgpt/ask` with a body parameter `question` to get your answer.

Note that you could easily change this route to whatever you want! You could do so by editing the `internal_api_route` key inside `chatgpt.php` config file under `app/config`.

```php
// This is the chatgpt.php config file. -> (app/config/chatgpt.php)

'internal_api_route' => '/api/chatgpt/ask'
```

### Method #2 - Using global helper function.

There is a `chatgpt()` global helper function which takes one parameter as the question you want to ask. You could use this method anywhere you like.

If you want to use this package inside any controller you could go about it like this:

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class ImaginaryController extends Controller
{
    /**
     * This method connects to ChatGPT servers
     * and asks the given question.
     *
     * @param  \Illuminate\Http\Response  $request
     * @return \Illuminate\Http\Response
     */
    public function ImaginaryMethod(Request $request)
    {
        $answer = chatgpt($request->input('question'));

        return response($answer, Response::HTTP_OK);
    }
}
```


### Method #3 - Using ChatGPT Facade.

If you prefer the facade's readability, I got you covered. You could do the exact same thing you were doing in previous method with the available facade; but there is literally NO difference between the two. 

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use HesamRad\LaravelChatGpt\ChatGptFacade as ChatGpt;

class ImaginaryController extends Controller
{
    /**
     * This method connects to ChatGPT servers
     * and asks the given question.
     *
     * @param  \Illuminate\Http\Response  $request
     * @return \Illuminate\Http\Response
     */
    public function ImaginaryMethod(Request $request)
    {
        $answer = chatgpt($request->input('question'));

        return response($answer, Response::HTTP_OK);
    }
}
```
