# pdg
Piranha Designs Test

## Goal:

To create a simple restricted area with 2 levels of access, using the given HTML files.

## Requirements / details:

There will be 2 types of users: the Administrator user and the Staff user. They will both access the protected area through a login form page.
The Administrator will manage Staff users and assign them "policies", which are like client accounts. Each policy belongs to one Staff user (or none). The Staff user will only see his assigned policies.

#### Administrator:
- When logging in will be taken to the Staff list page. This page shows a list of all current Staff users.
- To create new Staff users the Administrator has to use the "Create account" button, which will ask for a name and email. This will send an email with a unique link that the recipient will use to create a Staff user account.
- Clicking on a row on the Staff list page will take the admin to the Staff details page.
- The Staff detail page will show some basic details about the Staff and the list of policies assigned to him. From there the Administrator can add policy (from a list of existing unallocated ones) or remove existing ones (which will unlink the policy from that Staff user and will make it available for allocation).
- The "Remove Staff" option will remove the user (soft delete) and unlink all his policies.

#### Staff:
- When logging in will be taken to the Staff dashboard page, which will display a list of his policies.
- Clicking on a row on the list of policies will the user to a simple page (nothing fancy) that will display the details of that policy (same information as the table, read only).
- The file "policies.sql" contains a basic table for the policies (to be changed if required), that is assumed to contain data to be used as explained above (dummy data can be used for testing).
- Dependecies (if any) should be managed with Composer.

#### Test Users:
- admin/admin
- staff/staff
