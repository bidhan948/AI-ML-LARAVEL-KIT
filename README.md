Sure! Here is the updated documentation with the additional step to set the Python path:

# bidhan/aimlkit

AI/ML Integration Kit for Laravel

![GitHub version](https://img.shields.io/badge/version-1.0-brightgreen)

## REQUIREMENTS

- PHP >= 8.2
- Python >= 3 (with libraries: numpy, pandas, transformers, torch)

## 🚀 Installation

To install the package, follow these steps:

1. **📦 Install the package using Composer**:

    ```sh
    composer require bidhan/aimlkit:dev-master
    ```

2. **⚙️ Publish the configuration file**:

    ```sh
    php artisan vendor:publish --provider="Bidhan\AiMlKit\AiMlKitServiceProvider" --tag=config
    ```

3. **🐍 Set up a Python virtual environment**:

    ```sh
    python3 -m venv myenv
    source myenv/bin/activate
    ```

4. **🔧 Set the Python executable path**:
   
   Don't forget to add the Python path to your aimlkit.php configuration:
   
    ```env
    PY_EXECUTABLE_PATH="YOUR/PYTHON/PATH"
    ```

> **Note:** To copy the commands, you can click the clipboard icon next to each code block if you're viewing this on a platform that supports it, like GitHub.

## 📖 Usage

Here is an example of how to use the `BidhanAIMLKIT` to get sentiments:

```php
use Bidhan\AiMlKit\BidhanAIMLKIT;

$aimlkit = new BidhanAIMLKIT();
$sentiment = $aimlkit->getSentiments("ANY_STRING...");
print_r($sentiment);
```

## 👤 Authors

- [@bidhan948](https://github.com/bidhan948)

## 💡 PS*
Right now it is in the Development Phase and you are free to contribute 🙂

If you have any queries regarding this issue, feel free to reach out.