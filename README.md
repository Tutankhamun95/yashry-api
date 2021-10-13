# yashry-api

The coding challenge by Yashry -- API Cart (PHP & MySQL)

# - Description - An approach to the problem

Yashry-API is a custom built PHP API that provides endpoints to retrieve a list of products, add them to a cart and calculate their total price with respect to certain attributes (described below). 

## General Calculations

- Each product on the list is shipped from a certain country, with a certain weight & price. 
- Each country has its own shipping rate per "100 grams".
- There is a 14% VAT (before discounts) applied to all products, whatever the shipping country is.

## Specific Calculations

- Shoes are on 10% off.
- Buy any two tops (t-shirt or blouse) and get any jacket half its price.
- Buy any two items or more and get a maximum of $10 off shipping fees. 


