create a new list
-----------------------------------
curl --request POST \
--url 'https://usX.api.mailchimp.com/3.0/lists' \
--user 'anystring:apikey' \
--header 'content-type: application/json' \
--data '{"name":"Freddie'\''s Favorite Hats","contact":{"company":"MailChimp","address1":"675 Ponce De Leon Ave NE","address2":"Suite 5000","city":"Atlanta","state":"GA","zip":"30308","country":"US","phone":""},"permission_reminder":"You'\''re receiving this email because you signed up for updates about Freddie'\''s newest hats.","campaign_defaults":{"from_name":"Freddie","from_email":"freddie@freddiehats.com","subject":"","language":"en"},"email_type_option":true}' \
--include



create a new member
-----------------------------------
curl --request POST \
--url 'https://usX.api.mailchimp.com/3.0/lists/57afe96172/members' \
--user 'anystring:apikey' \
--header 'content-type: application/json' \
--data '{"email_address":"urist.mcvankab+3@freddiesjokes.com", "status":"subscribed"}' \
--include
