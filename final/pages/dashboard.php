<?php
session_start();
if(isset($_SESSION)){
    $user = ($_SESSION['user']);
}
else{
    $user = " ";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="../css/dashboard.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <nav>
            <div id="nav-bar">
                <ul>
                    <li><a class = "active" href = "#dashboard">Dashboard</a></li>
                    <li><a href = "login.php">Login</a></li>
                    <li><a href = "signUp.php">Sign Up</a></li>
                    <li><a href = "rubric.php">Rubric</a></li>
                    <li><a href = "logout.php">Log Out</a></li>
                </ul>
            </div>
        </nav>
            <div id = "invitation">
               <form>Invitation Link: <input type = "text" id = "link"></form>
            </div>
            <div id="timeSlots">
                <table id = "table">
                    <tr>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>Duration</th>
                        <th>Booked By</th>
                        <th><a href="#" onClick ="modalPop()">Add Mutiple Time Slots</a></th> 
                        <!--to be made a hyperlink later-->
                    </tr>
                </table>
            </div> 
                <div class="modal" tabindex="-1" role="dialog" id="insertModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Time Slot</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>Date: <input type = "date" id = "date"></form>
                                <form>Start Time: <input type = "time" id = "startTime"></form>
                                <form>End Time: <input type = "time" id = "endTime"></form>
                            </div>
                            <div class="modal-footer">
                                <button id = "cancelButton" type="button" class="btn btn-primary">Cancel</button>
                                <button id = "addButton" type="button" class="btn btn-secondary">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal" tabindex="-1" role="dialog" id="deleteModal" >
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id = "time1">
                                    
                                </div>
                                <div id = "time2">
                                    
                                </div>
                                <p>Are you sure you want to remove the time slot? This cannot be undone.</p>
                            </div>
                            <div class="modal-footer">
                                <button id = "cancelButton2" type="button" class="btn btn-primary">Cancel</button>
                                <button id = "yesButton" type="button" class="btn btn-secondary">Yes, Remove It!</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                
                
            </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script>
        var username = "";
        var numID;
        $( document ).ready(function() {
            username = "<?php echo $user?>";
            console.log(username);
            $.ajax({
    			type: "GET",
    			url: "../php/getSlot.php",
    			dataType: "json",
    			data: {
    			},
            	success: function(data) {
            	    console.log(data);

            	    for(var i = 0; i < data.length; i++){
            	    date = new Date(data[i]["date"]);
            	    var m = date.getMonth() + 1;
            	    var d = date.getDate() + 1;
            	    var y = date.getFullYear();
            	    console.log(date);
            	    var strDate = m + "/" + d + "/" + y;
            	    console.log(strDate);
            	        $("#table"). append("<tr><td>" + strDate + "</td><td>" + data[i]["start_time"] + "</td><td>" + data[i]["duration"] + "</td><td>" + data[i]["booked"] + "</td><td>" + "<button type='button' class='btn btn-outline-primary' onClick = 'details()'>Details</button> " + " <button type='button' class='btn btn-outline-primary' onClick = 'deleteById(" + data[i]['id'] + ")'>Delete</button>" + "</td></tr>");
            	    }
                },
                complete: function(data, status) {
                }
	    	});
        });
        $("#yesButton").on("click", function(){
            $.ajax({
    			type: "POST",
    			url: "../php/delete.php",
    			dataType: "json",
    			data: {
    			    "id" : numID,
    			},
            	success: function(data) {
                },
                complete: function(data, status) { 
                }
	    	});
	    	 window.location = "dashboard.php";
        });
        $("#cancelButton2").on("click", function(){
            $('#deleteModal').modal('hide');
        });
        function deleteById(id){
            $("#time1").empty();
            $("#time2").empty();
            $('#deleteModal').modal('show');
            numID = id;
            $.ajax({
                type: "GET",
                url: "../php/findId.php",
                dataType: "json",
                data: {
                    "id":numID,
                    
                },
                success: function(data){
                    
                    date = new Date(data["date"]);
                    
                    
            	    var m = date.getMonth() + 1;
            	    var d = date.getDate() + 1;
            	    var y = date.getFullYear();
            	    console.log(date);
            	    var strDate = m + "/" + d + "/" + y;
                    $("#time1").append("Start Time: " + strDate + "     " + data['start_time']);
                    $("#time2").append("Duration: " + data['duration']);
                },
                complete: function(data){
                    
                }
            });
        }
        function modalPop(){
            $('#insertModal').modal('show');
        }
        // $("#endTime").val()
        // $("#startTime").val()

        
        
        $("#addButton").on("click", function(){
            console.log(username)
            var duration = "uihasdihudsaihudsahiu";
            console.log($("#date").val());
            console.log($("#startTime").val());
            console.log($("#endTime").val());
            
            var startTime = $("#startTime").val().split(":");
            var endTime = $("#endTime").val().split(":");
            
            var sHour = parseInt(startTime[0])
            var sMin = parseInt(startTime[1]);
            var eHour = parseInt(endTime[0]);
            var eMin = parseInt(endTime[1]);
            
            var dHour = 0;
            var dMin = 0;
            
            
            // if(eHour <= sHour){
            //     //wrong
            //     console.log("something hour")
            //     duration = (eHour - sHour).toString();
            // }
            if (eMin >= sMin) {
                dMin = eMin - sMin;
                dHour = eHour - sHour;
                if(dMin == 0){
                    //1hour
                    duration = dHour.toString() + " hour";
                }
                if(dHour == 0){
                    //30min
                    duration = dMin.toString() + " min";
                }
                else{
                    //1 hour 30 min
                    duration = dHour.toString() + " hour " + dMin.toString() + " min";
                }
            }
            if(eMin < sMin){
                eHour = eHour - 1;
                eMin = eMin + 60;
                dMin = eMin - sMin;
                dHour = eHour - sHour;
                if(dMin == 0){
                    //1hour
                    duration = dHour.toString() + " hour";
                }
                if(dHour == 0){
                    //30min
                    duration = dMin.toString() + " min";
                }
                else{
                    //1 hour 30 min
                    duration = dHour.toString() + " hour " + dMin.toString() + " min";
                }
            }
            console.log("duration: " + duration);

            $.ajax({
    			type: "POST",
    			url: "../php/insert.php",
    			dataType: "json",
    			data: {
    			    "user" : username,
    			    "date":$("#date").val(),
    			    "start":$("#startTime").val(),
    			    "duration":duration,
    			    "booked":"Not Booked",
    			},
            	success: function(data) {
                },
                complete: function(data, status) { 
                }
	    	});

	    	window.location = "dashboard.php";
	    })
        </script>
    </body>
</html>