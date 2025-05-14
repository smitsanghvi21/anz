<?php
namespace {

  use Page;
  use SilverStripe\Control\Controller;
  use SilverStripe\Control\HTTPRequest;
  use SilverStripe\Control\HTTPResponse;

  class ChatbotController extends Controller
  {
      private static $allowed_actions = [
          'search'
      ];

      /**
       * GET /chatbot/search?query=...
       * Returns JSON array of {Title, Content} for any pages whose Title or Content include the query.
       */
      public function search(HTTPRequest $request)
      {
          $query = $request->getVar('query') ?: '';
          $pages = Page::get()
              ->filterAny([
                  'Title:PartialMatch'   => $query,
                  'Content:PartialMatch' => $query
              ]);

          $results = [];
          foreach ($pages as $page) {
              $results[] = [
                  'Title'   => $page->Title,
                  'Content' => $page->Content
              ];
          }

          return HTTPResponse::create()
              ->addHeader('Content-Type', 'application/json')
              ->setBody(json_encode($results));
      }
  }
}
