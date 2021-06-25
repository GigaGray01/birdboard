<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            .logo
            {
                display:flex;
                align-items:center;
                justify-content: center;
                padding: 150px;

            }
            .links{
                display:flex;
                align-items:center;
                justify-content: center;
            }
            a
            {
                text-decoration: none;
                background-color: #47cdff;
                border: 1px solid #47cdff;
                border-radius: 5px;
                width: 90px;
                padding: 2px;
                color: white;
                text-align: center;
            }
        </style>
    </head>
    <body class="antialiased">
        

        <div class="logo">
            <svg xmlns="http://www.w3.org/2000/svg" width="291" height="45" viewBox="0 0 291 45" class="text-default relative" style="top: 2px">
                <g fill="none" fill-rule="evenodd">
                    <g class="fill-current">
                        <path d="M58.544 19.568c1.056 0 1.988.26 2.796.78.808.52 1.436 1.252 1.884 2.196.448.944.672 2.04.672 3.288 0 1.248-.228 2.356-.684 3.324-.456.968-1.088 1.716-1.896 2.244-.808.528-1.732.792-2.772.792-.896 0-1.692-.192-2.388-.576a3.762 3.762 0 0 1-1.572-1.608V32h-2.952V14.336h2.976v7.368a3.893 3.893 0 0 1 1.584-1.572c.688-.376 1.472-.564 2.352-.564zm-.792 10.272c.992 0 1.76-.352 2.304-1.056.544-.704.816-1.688.816-2.952 0-1.248-.272-2.212-.816-2.892-.544-.68-1.32-1.02-2.328-1.02-1.008 0-1.784.344-2.328 1.032-.544.688-.816 1.664-.816 2.928 0 1.28.272 2.26.816 2.94.544.68 1.328 1.02 2.352 1.02zm8.76 2.16V19.88h2.976V32h-2.976zm-.192-17.616h3.336v2.952H66.32v-2.952zm12.984 5.208c.464 0 .864.064 1.2.192l-.024 2.736a4.171 4.171 0 0 0-1.584-.312c-1.024 0-1.804.296-2.34.888-.536.592-.804 1.376-.804 2.352V32h-2.976v-8.688c0-1.28-.064-2.424-.192-3.432h2.808l.24 2.136c.304-.784.784-1.384 1.44-1.8.656-.416 1.4-.624 2.232-.624zm14.232-5.256V32h-2.952v-1.944A3.893 3.893 0 0 1 89 31.628c-.688.376-1.472.564-2.352.564-1.04 0-1.968-.264-2.784-.792-.816-.528-1.452-1.276-1.908-2.244-.456-.968-.684-2.076-.684-3.324 0-1.248.224-2.344.672-3.288.448-.944 1.08-1.676 1.896-2.196.816-.52 1.752-.78 2.808-.78.864 0 1.636.18 2.316.54a3.8 3.8 0 0 1 1.572 1.524v-7.296h3zM87.44 29.84c.992 0 1.764-.344 2.316-1.032.552-.688.828-1.664.828-2.928s-.272-2.24-.816-2.928c-.544-.688-1.312-1.032-2.304-1.032-1.008 0-1.788.34-2.34 1.02-.552.68-.828 1.644-.828 2.892 0 1.264.276 2.248.828 2.952.552.704 1.324 1.056 2.316 1.056zm16.272-10.272c1.056 0 1.988.26 2.796.78.808.52 1.436 1.252 1.884 2.196.448.944.672 2.04.672 3.288 0 1.248-.228 2.356-.684 3.324-.456.968-1.088 1.716-1.896 2.244-.808.528-1.732.792-2.772.792-.896 0-1.692-.192-2.388-.576a3.762 3.762 0 0 1-1.572-1.608V32H96.8V14.336h2.976v7.368a3.893 3.893 0 0 1 1.584-1.572c.688-.376 1.472-.564 2.352-.564zm-.792 10.272c.992 0 1.76-.352 2.304-1.056.544-.704.816-1.688.816-2.952 0-1.248-.272-2.212-.816-2.892-.544-.68-1.32-1.02-2.328-1.02-1.008 0-1.784.344-2.328 1.032-.544.688-.816 1.664-.816 2.928 0 1.28.272 2.26.816 2.94.544.68 1.328 1.02 2.352 1.02zm14.256 2.352c-1.232 0-2.316-.256-3.252-.768a5.245 5.245 0 0 1-2.16-2.196c-.504-.952-.756-2.068-.756-3.348 0-1.28.252-2.396.756-3.348a5.245 5.245 0 0 1 2.16-2.196c.936-.512 2.02-.768 3.252-.768 1.216 0 2.288.256 3.216.768a5.264 5.264 0 0 1 2.148 2.196c.504.952.756 2.068.756 3.348 0 1.28-.252 2.396-.756 3.348a5.264 5.264 0 0 1-2.148 2.196c-.928.512-2 .768-3.216.768zm-.024-2.352c1.024 0 1.804-.332 2.34-.996.536-.664.804-1.652.804-2.964 0-1.296-.272-2.284-.816-2.964-.544-.68-1.312-1.02-2.304-1.02-1.008 0-1.784.34-2.328 1.02-.544.68-.816 1.668-.816 2.964 0 1.312.268 2.3.804 2.964.536.664 1.308.996 2.316.996zm20.328-9.96V32h-2.952v-1.944a3.893 3.893 0 0 1-1.584 1.572c-.688.376-1.472.564-2.352.564-1.056 0-1.992-.256-2.808-.768-.816-.512-1.448-1.24-1.896-2.184-.448-.944-.672-2.04-.672-3.288 0-1.248.228-2.356.684-3.324.456-.968 1.092-1.72 1.908-2.256.816-.536 1.744-.804 2.784-.804.88 0 1.664.188 2.352.564.688.376 1.216.9 1.584 1.572V19.88h2.952zm-6.072 9.96c.992 0 1.76-.344 2.304-1.032.544-.688.816-1.656.816-2.904 0-1.28-.272-2.264-.816-2.952-.544-.688-1.32-1.032-2.328-1.032-.992 0-1.764.356-2.316 1.068-.552.712-.828 1.7-.828 2.964 0 1.248.276 2.208.828 2.88.552.672 1.332 1.008 2.34 1.008zm15.864-10.248c.464 0 .864.064 1.2.192l-.024 2.736a4.171 4.171 0 0 0-1.584-.312c-1.024 0-1.804.296-2.34.888-.536.592-.804 1.376-.804 2.352V32h-2.976v-8.688c0-1.28-.064-2.424-.192-3.432h2.808l.24 2.136c.304-.784.784-1.384 1.44-1.8.656-.416 1.4-.624 2.232-.624zm14.232-5.256V32h-2.952v-1.944a3.893 3.893 0 0 1-1.584 1.572c-.688.376-1.472.564-2.352.564-1.04 0-1.968-.264-2.784-.792-.816-.528-1.452-1.276-1.908-2.244-.456-.968-.684-2.076-.684-3.324 0-1.248.224-2.344.672-3.288.448-.944 1.08-1.676 1.896-2.196.816-.52 1.752-.78 2.808-.78.864 0 1.636.18 2.316.54a3.8 3.8 0 0 1 1.572 1.524v-7.296h3zm-6.096 15.504c.992 0 1.764-.344 2.316-1.032.552-.688.828-1.664.828-2.928s-.272-2.24-.816-2.928c-.544-.688-1.312-1.032-2.304-1.032-1.008 0-1.788.34-2.34 1.02-.552.68-.828 1.644-.828 2.892 0 1.264.276 2.248.828 2.952.552.704 1.324 1.056 2.316 1.056z"></path>
                        

                        <text x="0" y="14" fill="black" font-family="Helvetica" font-size="16" font-weight="bold" transform="translate(51 14)">
                        birdBoard
                        </text>
                        <text x="80" y="14" fill="black" font-family="Helvetica" font-size="12" transform="translate(51 14)">
                        feathery reminders
                        </text>

                    </g>
                    <path class="stroke-current" stroke-opacity=".218" stroke-width=".5" d="M12.454 37L9 39.784l6.598.852L12.299 43 26 40.636"></path>
                    <path fill="#47D5Fa" d="M42.273 4C27.487 4 15.326 15.078 14.037 29.157c2.457-3.374 5.466-6.621 9.223-10.354a.738.738 0 0 1 1.029-.01c.286.273.29.722.01 1.001a169.806 169.806 0 0 0-2.688 2.732l-.175.184c-4.643 4.842-7.962 9.057-10.372 14.291a.702.702 0 0 0 .365.937.74.74 0 0 0 .963-.356 38.585 38.585 0 0 1 2.974-5.273c10.159-.253 19.406-5.757 24.252-14.515a.696.696 0 0 0-.016-.7.737.737 0 0 0-.625-.344h-2.694l4.83-2.689a.714.714 0 0 0 .328-.384A26.88 26.88 0 0 0 43 4.708.718.718 0 0 0 42.273 4z"></path>
                </g>
            </svg>
        </div>

        <div >
            @if (Route::has('login'))
                <div class="links">
                    @auth
                        <a href="{{ url('/projects') }}" class="text-sm ">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm ">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm ">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </body>
</html>
