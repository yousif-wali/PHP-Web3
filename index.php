<?php

class Web3Layout
{
    private $title;
    private $stylesheets = [];
    private $scripts = [];
    private $content;

    public function __construct($title = "Web3 Application")
    {
        $this->title = $title;
    }

    /**
     * Add a stylesheet to the layout.
     */
    public function addStylesheet($stylesheet)
    {
        $this->stylesheets[] = $stylesheet;
    }

    /**
     * Add a script to the layout.
     */
    public function addScript($script)
    {
        $this->scripts[] = $script;
    }

    /**
     * Set the main content of the layout.
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Generate and render the full layout.
     */
    public function render()
    {
        echo $this->generateLayout();
    }

    /**
     * Generate the HTML layout as a string.
     */
    private function generateLayout()
    {
        $styles = $this->renderStyles();
        $scripts = $this->renderScripts();
        $walletScript = $this->generateWalletScript();
        $content = $this->content ?? '<p>Welcome to the Web3 Application</p>';

        return <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$this->title}</title>
    {$styles}
</head>
<body>
    <header>
        <h1>{$this->title}</h1>
        <button id="connectWalletButton" onclick="connectWallet()">Connect Wallet</button>
        <p id="walletAddress" style="margin-top: 10px; color: green;"></p>
    </header>
    <main>
        {$content}
    </main>
    <footer>
        <p>&copy; 2024 Web3 Application</p>
    </footer>
    {$walletScript}
    {$scripts}
</body>
</html>
HTML;
    }

    /**
     * Generate the styles section.
     */
    private function renderStyles()
    {
        $stylesHtml = '';
        foreach ($this->stylesheets as $stylesheet) {
            $stylesHtml .= "<link rel=\"stylesheet\" href=\"{$stylesheet}\">\n";
        }
        return $stylesHtml;
    }

    /**
     * Generate the scripts section.
     */
    private function renderScripts()
    {
        $scriptsHtml = '';
        foreach ($this->scripts as $script) {
            $scriptsHtml .= "<script src=\"{$script}\"></script>\n";
        }
        return $scriptsHtml;
    }

    /**
     * Generate the Web3 wallet connection script.
     */
    private function generateWalletScript()
    {
        return <<<HTML
<script>
    async function connectWallet() {
        if (window.ethereum) {
            try {
                const accounts = await ethereum.request({ method: 'eth_requestAccounts' });
                const walletAddress = accounts[0];
                document.getElementById('walletAddress').innerText = 'Wallet Connected: ' + walletAddress;
            } catch (error) {
                console.error("Error connecting wallet:", error);
                alert("Failed to connect wallet. Please try again.");
            }
        } else {
            alert("No Ethereum provider found. Install MetaMask!");
        }
    }
</script>
HTML;
    }
}

// Usage example:
$layout = new Web3Layout("My Web3 App");
$layout->addStylesheet("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css");
$layout->addStylesheet("styles.css");
$layout->addScript("https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js");
$layout->addScript("scripts.js");
$layout->setContent("<p>Connect your wallet to interact with the blockchain.</p>");
$layout->render();
