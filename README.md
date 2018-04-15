This repo was created in fulfillment of a skills exercise presented by Bold Leads
(https://github.com/boldleadsdevelopment/full-stack-code-exercise)

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