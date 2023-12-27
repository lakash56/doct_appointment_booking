<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Requirement</title>
    <style>
        td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
    <H1>PS-3</H1>
    <h4>Name of project: E-Doct</h4>
    <h6>Overview:</h6>
    <p>
        E-Doct is a web platform that connects doctor and patient via website. This is an online Doctor appointment booking system. Using this system people can make an appointment as they need and also schedule accordingly. As this is an online platform a patient can have access to their prescription anywhere they need. This kind of service helps in reducing paperwork.
        A doctor can login into the system and see all patient details. Booking appointments via an online platform is more convenient and time saving for both patients and administration because patient has direct access to the system and select the dates which will make admin's job more fast. This kind of application will make administrative work more easy and transparent as all the records of both doctors and patients will be stored into the database. The main purpose of this application is to build a complete appointment system in order to save time and provide better health service.
    </p>
    <p>In real world context this kind of applicaiton can be used by AIT clinic. Where if student/staff or any other person needs a check up they can easily book and appointmen and get quality health check ups.</p>

</div>
</div>
<h4>Functional Requirements</h4>
    <div class="row">
        <div class="col-md-6">
        <table style="border:1px solid;">
            <tr>
            <th>Features</th>
            <th>Priority</th>
            </tr>
            <tr>
                <th>There should be three users: admin, patient, doctor</th>
                <th>high</th>
            </tr>
            <tr>
                <th>Patient can signup and login into the sytem</th>
                <th>high</th>
            </tr>
            <tr>
                <th>Patient should see all the available dotors in the webpage</th>
                <th>high</th>
            </tr>
            <tr>
                <th>After login patient can select the ime slots according to there needs</th>
                <th>high</th>
            </tr>
            <tr>
                <th>Patient should see all the available doctors in the selected date and time</th>
                <th>high</th>
            </tr>
            <tr>
                <th>Patient can see and update there profiles</th>
                <th>Medium</th>
            </tr>
            <tr>
                <th>Patient can view there prescription</th>
                <th>high</th>
            </tr>
            <tr>
                <th>Doctor can login into the system</th>
                <th>high</th>
            </tr>
            <tr>
                <th>Doctor can view all there patient</th>
                <th>high</th>
            </tr>
            <tr>
                <th>A doctor can write prescription to the patient</th>
                <th>high</th>
            </tr>
            <tr>
                <th>Doctors can add medicine in the prescription</th>
                <th>high</th>
            </tr><tr>
                <th>A doctor can manage there profile</th>
                <th>high</th>
            </tr>
            <tr>
                <th>A super admin can manage entire website</th>
                <th>high</th>
            </tr>
            <tr>
                <th>Admin can change patient status, if the visited to doctor or not</th>
                <th>high</th>
            </tr>
            <tr>
                <th>Admin can add doctors to the system</th>
                <th>high</th>
            </tr>
            <tr>
                <th>Admin can view all patient</th>
                <th>high</th>
            </tr>
            <tr>
                <th>Admin can add departments</th>
                <th>high</th>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <div class="row"><h6>Basic-ERD</h6></div>
        <hr>
        <img src={{ asset('asset/images/erd.png') }} alt="basic idea of erd" style="width: 100%">
    </div>
    </div>
</div>

<footer class="text-center mt-4">
    ps3- project requirements
</footer>
</body>
</html>
