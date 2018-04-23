This repo was created in fulfillment of a skills exercise presented by Bold Leads
(https://github.com/boldleadsdevelopment/full-stack-code-exercise), reproduced here:

# BoldLeads Full Stack Interview Exercise
  Problem
  
  
##  Problem Flow
  You are tasked with building a lead capturing system that is part 
  of an overall lead generation system for Real Estate Agents. 
  The company marketing team has developed a campaign that will 
  send to your part of the system a continual flow of leads. 
  The leads are coming to get a free Comparative Market Analysis 
  (CMA) for their home. For your part you need to build the landing 
  page to collect the lead information, database to store the lead 
  information and lead dashboard to view master/detail lead 
  information. The overall flow of the system is as follows:
1. **Lead** fills out a landing page form to get a Comparative Market 
Analysis (CMA) sent to them
1. **Landing Page** display form to collect
    - First & last name
    - Email address
    - Phone number
    - Address
    - Home sqft
1. **Landing Page** captures full or partila information to the database.
1. **Real Estate Agent** accesses lead dashboard to view list of leads.
1. **Dashboard** displays
    - First & last name
    - Email address
    - Phone number
    - Address
    - Home sqft
1. **Real Estate Agent** selects a lead to view detailed information.
1. **Lead Detail** displays
    - First & last name
    - Email address
    - Phone number
    - Address
    - Home sqft
1. **Real Estate Agent** uses the info to contact the lead and send CMA.

##  Solution
  
  To address this problem you need to create the following:
* Landing page with a simple form to collect the following:
    - First & Last name
    - Email Address
    - Phone number
    - Address
    - Home square footage
* Dashboard listing page to all view leads. The listing page should list leads in alphabetical order displaying:
    - First & Last name
    - Email Address
    - Date lead was saved to the database
* Detail page to view a individual lead. With the following information:
    - First & Last name
    - Email Address
    - Phone number
    - Address
    - Home square footage
  
Things to consider when building the solution.
* Leads may not fill out everything in the Landing page or they may 
leave the page before hitting submit. We want to be able to able to 
capture anything they may enter into the form without them submitting 
the form (hint: Ajax may help here).
* Making the landing page as simple and visually appealing will 
increase the likelihood that the lead will complete the entire form, 
hence creating a better lead.
* We do not expect you to spend more than 4 hours working on this 
solution. So please do not stress out if is not perfect or you feel 
more can be done. Just add notes in your git commits on how you 
would add or do more if you had more time. The expectations are for 
a basic working solution of 3 pages (landing page, lead dashboard 
listing page, lead detail page) and database.
  
Your solution should be created in a https://github.com/ repository. 
Your git log should contain several commits showing your development 
workflow/progress, we want to see your individual commits as you 
build the solution.
  
You should also create a README with a description of the project 
and setup instructions. We also expect to be able to run a basic 
set of tests so we can validate the solution works, so please make 
sure you explain in your README how to run the tests.
You can create your solution using any modern web development 
framework, language, and database, but extra points for doing it 
in PHP (we are a LAMP shop).

# My solution
The site consists of four primary pages plus an entry page to describe the intent.
* A page for clients to enter their contact information in exchange for receiving a CMA 
* A Thank you page for completing the form
* A page for agents to view the list of leads who entered information into the form
* A page for agents to view the details of an individual lead.

There's a bit a Javascript to capture incomplete information from the form as well.

Installation:
1. Set the site up as you wish
2. Use the included SQL dump in the root of the project to create a starter database
3. The file `/src/DBService` includes database credentials for connection to the database. 
Use those or create your own and modify the defined values there.

That's it!
You should be able to enter full or partial information in the client form,
and see the information on the agent pages.

_Caveats_

In the interest of time, I did not do a number things that would be standard
practice in a production site:
* There is no sanitization of data from the form, either client or server side.
I thought about adding some basic validation of zip code lengths,
and phone number formats, but just didn't bother.
* I didn't bother fancying the display of dates for typical American consumption.
* I called a halt to some additional CSS work, _e.g._, making sure the footer sticks to the bottom of the screen.

At any rate, this should provide enough information on my basic proficiency 
with PHP, MySQL, Javascript (at least jQuery), and CSS.