<!DOCTYPE html>
<html lang="en">
<head>
    <% base_tag %>
    <title>$Title</title>
    $MetaTags(false)
    <% require themedCSS("styles") %>
</head>
<body>
    <header>
        <h1>$SiteConfig.Title</h1>
        <nav>
            <ul>
                <% loop $Menu(1) %>
                    <li class="$LinkingMode"><a href="$Link">$MenuTitle</a></li>
                <% end_loop %>
            </ul>
        </nav>
    </header>

    <main>
        $Layout
        
        <!-- React Chatbot Root -->
      
    </main>

    <!-- Load React Bundle - Place at the end of body -->
    <script defer src="/chatbot/static/js/main.js"></script>
    <link rel="stylesheet" href="/chatbot/static/css/main.css">
</body>
</html>
