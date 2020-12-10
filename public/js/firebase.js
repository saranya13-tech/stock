const firebaseConfig = {
  apiKey: "AIzaSyAH3sCmeHjRno1tHwLfJqp9blOR1Hc1YtU",
  authDomain: "tgcom-ac664.firebaseapp.com",
  databaseURL: "https://tgcom-ac664.firebaseio.com",
  projectId: "tgcom-ac664",
  storageBucket: "tgcom-ac664.appspot.com",
  messagingSenderId: "423631908842",
  appId: "1:423631908842:web:8ee14d904ec88bbcd54c93",
  measurementId: "G-P9X9XFPQK2"
};
var db
//firebase.initializeApp(firebaseConfig);
 var app = firebase.initializeApp(firebaseConfig);
db = firebase.firestore(app);
//.............................

const messaging=  firebase.messaging();
 messaging 
       .requestPermission()
       .then(function(){
       			console.log("Notification permission granted.");
       			return messaging.getToken()

       		}).then(function(token){
 				
 				console.log(token)

       		}).
       		catch(function(err){
       			console.log("unable to get permission to notify.",err);




       });
 //.........................


 messaging.onMessage((payload) => {


console.log(payload);


 })
  
