LOAD DATA INFILE '/Users/jasong/dev/csv-from-netsuite/BBY-11-9-16.csv'
INTO TABLE Orders
FIELDS TERMINATED BY ","
(@Internal_ID, @Enter_Date, @Ship_Date, Name, Address, Ship_Method,
Ship_Via, @SO_Num, PO_Num, SKU, Ship_Qty, Casepack)
SET
Internal_ID = nullif(@Internal_ID, ''),
Enter_Date = nullif(@Enter_Date, ''),
Ship_Date = nullif(@Ship_Date, ''),
SO_Num = nullif(@SO_Num, '');
