# ServerDashboard

A PHP dashboard to provide basic monitoring of server availability, by querying if ports are open or closed. Not particularly scalable but better than nothing. If ports are open, then a URL can be provided to browse to a relevant address.

## Configuration

Add array entries for each server/port to be monitored, in the format below.

*array("hostname",port,"description","URL"),  
array("hostname",port,"description","URL)*

As an example, the entries below would monitor an SQL Server on port 1433, a web server on port 80 with URL and a SIP server on port 5060.

*array("hq-sql01",1433,"HQ SQL Server",""),  
array("ca-webapp03",80,"California Web Server","http://ca-webapp03.corp.local/"),  
array("hq-pbx",5060,"HQ PBX","")*

This requires that the web server hosting the dashboard is able to communicate with the monitored servers/ports.
