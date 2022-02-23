@if(Auth::check())
@include("layouts.includes.header")
@else
	@include("layouts.includes.headerb")
@endif

<body>
@yield("content")
</body>
@include("layouts.includes.footer")



<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.1/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.6.1/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyCx9lH9KL406r5PR4W0CICLXuccEoWUz14",
    authDomain: "ntctruck-e8727.firebaseapp.com",
    projectId: "ntctruck-e8727",
    storageBucket: "ntctruck-e8727.appspot.com",
    messagingSenderId: "450535434960",
    appId: "1:450535434960:web:b0d57dae4c633bb0708cd5",
    measurementId: "G-CJTRMWWYHT"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
</script>