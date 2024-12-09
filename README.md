# Web3 Application Layout with Wallet Connection

This project provides a PHP-based layout for a Web3 application, including wallet connection functionality using **Web3.js** and MetaMask. It serves as a starting point for creating decentralized applications (dApps).

## Features

- **Dynamic Layout:** Easily customizable PHP class for generating HTML layouts.
- **Wallet Connection:** Connect to an Ethereum wallet (MetaMask) with a simple button.
- **Responsive Design:** Includes placeholders for styles and scripts to create a responsive UI.
- **Web3.js Integration:** Uses Web3.js for blockchain interactions.

## Demo

### Connect Wallet Feature
- Click the **"Connect Wallet"** button to connect your MetaMask wallet.
- The connected wallet address will be displayed in the UI.

## Requirements

- PHP 7.4 or higher
- A browser with MetaMask installed
- Basic knowledge of PHP and JavaScript

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/yousif-wali/PHP-Web3.git
   cd PHP-Web3
   ```

2. Set up a web server (e.g., Apache, Nginx) or use a local server like XAMPP or MAMP.

3. Place the files in the server's document root (e.g., `htdocs` for XAMPP).

4. Open your browser and navigate to the project directory (e.g., `http://localhost/web3-layout`).

## Usage

### Adding Stylesheets
You can add stylesheets dynamically using the `addStylesheet` method:
```php
$layout->addStylesheet("path/to/stylesheet.css");
```

### Adding Scripts
You can add external or local scripts dynamically using the `addScript` method:
```php
$layout->addScript("path/to/script.js");
```

### Setting Page Content
Define the main content of the page using the `setContent` method:
```php
$layout->setContent("<p>Your custom content here.</p>");
```

### Example Layout
```php
$layout = new Web3Layout("My Web3 App");
$layout->addStylesheet("styles.css");
$layout->addScript("https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js");
$layout->setContent("<p>Welcome to the dApp. Connect your wallet to get started!</p>");
$layout->render();
```

## File Structure
```
.
├── index.php          # Main entry point for the application
├── styles.css         # Example stylesheet (optional)
└── README.md          # Project documentation
```

## Contributing

Contributions are welcome! Please submit a pull request or open an issue to discuss improvements or new features.

---

**Happy Coding! 🚀**
