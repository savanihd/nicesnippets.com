// Your web app's Firebase configuration
var firebaseConfig = {
  apiKey: "AIzaSyDPkHGfUy-QHamz3c7i-m2MT8LN3P8a3qk",
  authDomain: "nicesnippets-ac8ec.firebaseapp.com",
  databaseURL: "https://nicesnippets-ac8ec.firebaseio.com",
  projectId: "nicesnippets-ac8ec",
  storageBucket: "nicesnippets-ac8ec.appspot.com",
  messagingSenderId: "991050754900",
  appId: "1:991050754900:web:1f59308d7e17a5220076c1",
  measurementId: "G-7P249RWE52"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);

Notification.requestPermission().then((permission) => {
  if (permission === 'granted') {
    console.log('Notification permission granted.');
    // TODO(developer): Retrieve an Instance ID token for use with FCM.
    if(isTokenSentToServer()){
        console.log('Token Already Saved.');
    }else{
        getRegToken();
    }
    
  } else {
    console.log('Unable to get permission to notify.');
  }
});

// Retrieve Firebase Messaging object.
const messaging = firebase.messaging();

// Add the public key generated from the console here.
messaging.usePublicVapidKey("BCdo3qyXykmeI96JQ_hrmVADQ1jouWIlNVwGcg0tptmYyG8Y_GIQ8IyrFCdDMoYwUi01KGcxQBa9hOmR5J5Kbak");

// Get Instance ID token. Initially this makes a network call, once retrieved
// subsequent calls to getToken will return from cache.
function getRegToken(){
    messaging.getToken().then((currentToken) => {
      if (currentToken) {
        // sendTokenToServer(currentToken);
        saveToken(currentToken);
        setTokenSentToServer(true);
      } else {
        // Show permission request.
        console.log('No Instance ID token available. Request permission to generate one.');
        setTokenSentToServer(false);
      }
    }).catch((err) => {
      console.log('An error occurred while retrieving token. ', err);
      showToken('Error retrieving Instance ID token. ', err);
      setTokenSentToServer(false);
    });
}

function setTokenSentToServer(sent) {
    window.localStorage.setItem('sentToServer', sent ? '1' : '0');
}

function isTokenSentToServer() {
    return window.localStorage.getItem('sentToServer') === '1';
}

function saveToken(currentToken){
    $.ajax({
        url: "/token/save",
        method: 'GET',
        data: {currentToken:currentToken},
        success: function(data) {
            console.log(data.success);
        }
    });
}

messaging.onMessage((payload) => {
  console.log('Message received. ', payload);
  const notificationTitle = payload.data.title;
  const notificationOptions = {
    body: payload.data.body,
    icon: 'https://www.nicesnippets.com/image/imgpsh_fullsize.png',
    url: 'https://nicesnippets.com'
  };

  var notification = new Notification(notificationTitle,notificationOptions);
});