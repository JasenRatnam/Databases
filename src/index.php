<?php $page_title="Home"; 
	include 'header.php';
?>


<head>

<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">


<head>


<body>
  <div class="w3-top">
    <div class="w3-bar w3-red w3-card w3-left-align w3-large">
      <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
      <a href="#" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
      <a href="./Person/" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Person</a>
      <a href="./Vaccination" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Vaccination</a>
      <a href="./Vaccine" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Vaccine</a>
      <a href="./Facility" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Public Health Facilities</a>
      <a href="./bookings/" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Bookings</a>
      <a href="./infectionVariant" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">COVID-19 Types</a>
      <a href="./ProvinceAgeGroup" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Provinces</a>
      <a href="../AgeGroup" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Age Groups</a>
      <a href="./worksAt" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Employee Work Assignment</a>
    </div>
  </div>

  <!-- Header -->
  <header class="w3-container w3-red w3-center" style="padding:128px 16px">
    <h1 class="w3-margin w3-jumbo">Welcome to C19PVS!</h1>
    <p class="w3-xlarge">The Official COVID-19 Public Healthcare Population Vaccination System</p>
  </form>
  </header>

  <!-- First grid-->
  <div class="w3-row-padding w3-padding-64 w3-container">
    <div class="w3-content">
      <div class="w3-twothird">
        <h1>A Historic Pandemic</h1>
        <h5 class="w3-padding-32">Coronaviruses are a type of virus. There are many different kinds, and some cause disease. 
                                  <br>A coronavirus identified in 2019, SARS-CoV-2, has caused a pandemic of respiratory illness, called COVID-19.</h5>
        <p class="w3-text-grey">
          COVID-19 is primarily transmitted from person-to-person through respiratory droplets. These droplets are released when someone with COVID-19 
          sneezes, coughs, or talks. Infectious droplets can land in the mouths or noses of people who are nearby or possibly be inhaled into the lungs. 
          <br><br> A physical distance of at least 1 meter (3 ft) between persons is recommended by the World Health Organization (WHO) to avoid infection, 
          whereas CDC recommends maintaining a physical distance of at least 1.8 meters (6ft) between persons. Respiratory droplets can land on hands, objects 
          or surfaces around the person when they cough or talk, and people can then become infected with COVID-19 from touching hands, objects or surfaces with 
          droplets and then touching their eyes, nose, or mouth. 
          Recent data suggest that there can be transmission of COVID-19 through droplets of those with mild symptoms or those who do not feel ill. <br> <br>
          Current data do not support long range aerosol transmission of SARS-CoV-2, such as seen with measles or tuberculosis. 
          Short-range inhalation of aerosols is a possibility for COVID-19, as with many respiratory pathogens. However, this cannot easily be distinguished 
          from “droplet” transmission based on epidemiologic patterns. 
          Short-range transmission is a possibility particularly in crowded medical wards and inadequately ventilated spaces. 
        </p>
      </div>
      <div class="w3-third w3-center">
        <img src="Caduceus_rod.jpg" />
      </div>
    </div>
  </div>

<!-- Second Grid -->
  <div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
    <div class="w3-content">
      <div class="w3-third w3-center"> <img width="200px" height="200px"src="crosslogo.png"/>
        <i class="fa  w3-padding-64 w3-text-red w3-margin-right"></i>
      </div>

      <div class="w3-twothird">
        <h1>COVID-19 Public Health Care Population Vaccination System Application</h1>
        <h5 class="w3-padding-32">
            GOAL:<br> 
            Develop a database system, called COVID-19 Public Health Care Population Vaccination System (C19PVS), 
            to help the public health Care System with the process of vaccinating the population.
        </h5>
        <p class="w3-text-grey">
            The application can maintain personal information about the population registered with the Public Health 
            care system, information about the population involved in the vaccination process against the COVID-19 pandemic, 
            and information about the public health care employees involved in the vaccination process. 
            Also, the history of infection with COVID-19 for every person including date of infection should be maintained by the 
            system. A person could be infected many times.
        </p>
      </div>
    </div>
  </div>

<!-- Bottom Grid -->
  <div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
      <h1 class="w3-margin w3-xlarge">Courtesy of Team BNC353_2</h1>
      <p class="w3-text-grey">
        Jasen Ratnam		40094237 <br>
        Ali Turkman			40111059 <br>
        John Carlo Estoesta	40112372<br>
        Philippe Carrier		40153985<br>
      </p>
  </div>
</body>
</html>
