// Define a simple JavaScript function named "hello"
function hello() {
    return "Hello";
}

/*
 Notes:
 - This file is stored in the "public" directory, meaning it is directly accessible via a URL.
 - Unlike JavaScript files in "resources/js", this file is not processed by Vite or Webpack.
 - You can include this script in your Blade template using:
   
   <script src="{{ asset('index.js') }}"></script>

 - This method is useful for scripts that do not need bundling or processing.
 - However, for better optimization, it is recommended to place JavaScript files in "resources/js" and use Vite for handling them.
*/