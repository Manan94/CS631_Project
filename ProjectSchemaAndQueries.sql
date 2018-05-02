Create table CUSTOMER (
CID INT (10) PRIMARY KEY AUTO_INCREMENT,
FName VARCHAR (30) NOT NULL,
LName VARCHAR (30) NOT NULL,
Email VARCHAR (30),
Address VARCHAR (50),
Phone INT (10),
Status VARCHAR (5));

Create table PRODUCT (
PID INT (10) PRIMARY KEY AUTO_INCREMENT,
PType VARCHAR (5) NOT NULL,
PName VARCHAR (30) NOT NULL,
PPrice INT (5),
Description VARCHAR (50),
PQuantity INT (5));

Create table CREDIT_CARD (
CCNumber VARCHAR (16) PRIMARY KEY,
SecNumber INT (3) NOT NULL,
OwnerName VARCHAR (20) NOT NULL,
CCType VARCHAR(10) NOT NULL,
CCAddress VARCHAR(50) NOT NULL,
ExpDate Date NOT NULL);

Create table STORED_CARD (
CCNumber VARCHAR (16) NOT NULL,
CID INT(10) NOT NULL,
PRIMARY KEY(CCNumber, CID),
FOREIGN KEY (CCNumber) REFERENCES CREDIT_CARD(CCNumber),
FOREIGN KEY (CID) REFERENCES CUSTOMER(CID));


Create table SILVER_AND_ABOVE (
CID INT(10) NOT NULL,
CreditLine DECIMAL NOT NULL,
PRIMARY KEY(CID),
FOREIGN KEY (CID) REFERENCES CUSTOMER(CID));


Create table SHIPPING_ADDRESS (
CID INT(10) NOT NULL,
SAName VARCHAR(20) NOT NULL,
RecepientName VARCHAR(20) NOT NULL,
Street VARCHAR(20) NOT NULL,
SNumber INT(5) NOT NULL,
City VARCHAR(20) NOT NULL,
Zip VARCHAR(5) NOT NULL,
State VARCHAR(20) NOT NULL,
Country VARCHAR(20) NOT NULL,
PRIMARY KEY(CID, SAName),
FOREIGN KEY (CID) REFERENCES CUSTOMER(CID));


Create table CART (
CartID INT(10) PRIMARY KEY AUTO_INCREMENT,
CID INT(10) NOT NULL,
SAName VARCHAR(20),
CCNumber VARCHAR (16),
TStatus VARCHAR(5),
TDate Date,
FOREIGN KEY (CID,SAName) REFERENCES SHIPPING_ADDRESS(CID,SAName));


Create table OFFER_PRODUCT (
PID INT (10) PRIMARY KEY,
OfferPrice DECIMAL NOT NULL,
FOREIGN KEY (PID) REFERENCES PRODUCT(PID));


Create table APPEARS_IN (
CartID INT(10) NOT NULL,
PID INT(10) NOT NULL,
Quantity INT(5) NOT NULL,
PriceSold DECIMAL NOT NULL,
PRIMARY KEY(PID, CartID),
FOREIGN KEY (PID) REFERENCES PRODUCT(PID),
FOREIGN KEY (CartID) REFERENCES CART(CartID));


Create table COMPUTER (
PID INT (10) PRIMARY KEY,
CPUType VARCHAR(20) NOT NULL,
FOREIGN KEY (PID) REFERENCES PRODUCT(PID));

Create table LAPTOP (
PID INT (10) PRIMARY KEY,
BType VARCHAR(20) NOT NULL,
Weight DECIMAL NOT NULL,
FOREIGN KEY (PID) REFERENCES COMPUTER(PID));

Create table PRINTER (
PID INT (10) PRIMARY KEY,
PrinterType VARCHAR(20) NOT NULL,
Resolution VARCHAR(20) NOT NULL,
FOREIGN KEY (PID) REFERENCES PRODUCT(PID));

INSERT INTO `customer` (`CID`, `FName`, `LName`, `Email`, `Address`, `Phone`, `Status`) VALUES 
(NULL, 'Junaid', 'Malik', 'jm794@njit.edu', 'Newark, NJ', '1111111111', 'R');

INSERT INTO `customer` (`CID`, `FName`, `LName`, `Email`, `Address`, `Phone`, `Status`) VALUES 
(NULL, 'Mannan', 'Gandhi', 'mg@njit.edu', 'Harrison, NJ', '1111111111', 'S');

INSERT INTO `customer` (`CID`, `FName`, `LName`, `Email`, `Address`, `Phone`, `Status`) VALUES 
(NULL, 'Rahul', 'Sinha', 'rs@njit.edu', 'New York, NY', '1111111111', 'G');

INSERT INTO `customer` (`CID`, `FName`, `LName`, `Email`, `Address`, `Phone`, `Status`) VALUES 
(NULL, 'John', 'Smith', 'js@njit.edu', 'New York, NY', '1111111111', 'P');


INSERT INTO `silver_and_above` (`CID`, `CreditLine`) VALUES ('2', '10'), ('3', '15'), ('4', '20');

INSERT INTO `credit_card` (`CCNumber`, `SecNumber`, `OwnerName`, `CCType`, `CCAddress`, `ExpDate`) VALUES 
('1234123412341234', '123', 'Junaid Malik', 'Visa', 'Newark, NJ', '2018-07-12');

INSERT INTO `credit_card` (`CCNumber`, `SecNumber`, `OwnerName`, `CCType`, `CCAddress`, `ExpDate`) VALUES 
('1111111111111111', '111', 'Mannan Gandhi', 'Master', 'New York, NY', '2019-09-12');

INSERT INTO `credit_card` (`CCNumber`, `SecNumber`, `OwnerName`, `CCType`, `CCAddress`, `ExpDate`) VALUES 
('2222222222222222', '222', 'Dimitri', 'Master', 'Wallingford, CT', '2019-02-11');

INSERT INTO `credit_card` (`CCNumber`, `SecNumber`, `OwnerName`, `CCType`, `CCAddress`, `ExpDate`) VALUES 
('3333333333333333', '333', 'Clark', 'Discover', 'Seattle, WA', '2018-03-10');


INSERT INTO `stored_card` (`CCNumber`, `CID`) VALUES ('1234123412341234', '1');

INSERT INTO `stored_card` (`CCNumber`, `CID`) VALUES ('1111111111111111', '2');

INSERT INTO `stored_card` (`CCNumber`, `CID`) VALUES ('2222222222222222', '3');


INSERT INTO `shipping_address` (`CID`, `SAName`, `RecepientName`, `Street`, `SNumber`, `City`, `Zip`, `State`, `Country`) VALUES 
('1', 'Home', 'Junaid', 'Groove', '1', 'Newark', '07102', 'NJ', 'USA');

INSERT INTO `shipping_address` (`CID`, `SAName`, `RecepientName`, `Street`, `SNumber`, `City`, `Zip`, `State`, `Country`) VALUES 
('2', 'Apartment', 'Gandhi', 'Broadway', '2', 'New York', '01102', 'NY', 'USA');

INSERT INTO `shipping_address` (`CID`, `SAName`, `RecepientName`, `Street`, `SNumber`, `City`, `Zip`, `State`, `Country`) VALUES 
('3', 'Apartment', 'Rahul', 'Pamela', '1', 'Wallingford', '06492', 'CT', 'USA');

INSERT INTO `product` (`PID`, `PType`, `PName`, `PPrice`, `Description`, `PQuantity`) VALUES 
(NULL, 'D', 'Intel core i5', '800', 'Intel i5 computer 1st generation', '10');

INSERT INTO `product` (`PID`, `PType`, `PName`, `PPrice`, `Description`, `PQuantity`) VALUES 
(NULL, 'D', 'Core2duo', '600', 'Intel core 2 computer', '12');

INSERT INTO `product` (`PID`, `PType`, `PName`, `PPrice`, `Description`, `PQuantity`) VALUES 
(NULL, 'D', 'Dell i5', '750', 'Dell computer i5', '5');

INSERT INTO `product` (`PID`, `PType`, `PName`, `PPrice`, `Description`, `PQuantity`) VALUES 
(NULL, 'D', 'Pentium 4', '350', 'Pentium 4 Intel Inside', '10');

INSERT INTO `product` (`PID`, `PType`, `PName`, `PPrice`, `Description`, `PQuantity`) VALUES 
(NULL, 'D', 'Pentium 2', '150', 'IBM 2nd Gen', '5');

INSERT INTO `product` (`PID`, `PType`, `PName`, `PPrice`, `Description`, `PQuantity`) VALUES 
(NULL, 'L', 'HP Notebook', '1000', 'HP Notebook 2nd Gen', '20');

INSERT INTO `product` (`PID`, `PType`, `PName`, `PPrice`, `Description`, `PQuantity`) VALUES 
(NULL, 'L', 'MacBook', '1200', 'MacBook Apple', '10');

INSERT INTO `product` (`PID`, `PType`, `PName`, `PPrice`, `Description`, `PQuantity`) VALUES 
(NULL, 'L', 'Dell Inspiron', '500', 'Dell Laptop', '15');

INSERT INTO `product` (`PID`, `PType`, `PName`, `PPrice`, `Description`, `PQuantity`) VALUES 
(NULL, 'L', 'HP Pro Book', '1500', 'HP 2018 Probook 5GHz', '10');

INSERT INTO `product` (`PID`, `PType`, `PName`, `PPrice`, `Description`, `PQuantity`) VALUES 
(NULL, 'L', 'Sony SmartBook', '700', 'Sony SmartBook i5 3rd Gen', '5');

INSERT INTO `product` (`PID`, `PType`, `PName`, `PPrice`, `Description`, `PQuantity`) VALUES 
(NULL, 'P', 'Intel Smart Printer', '500', 'Smart Printer 20 colors', '5');

INSERT INTO `product` (`PID`, `PType`, `PName`, `PPrice`, `Description`, `PQuantity`) VALUES 
(NULL, 'P', 'IBM LaserJet', '300', 'LaserJet Technology IBM 60 Pager per minute', '10');

INSERT INTO `product` (`PID`, `PType`, `PName`, `PPrice`, `Description`, `PQuantity`) VALUES 
(NULL, 'P', 'Synthetic Printer', '600', 'Synthetic Printer with New Technology', '10');

INSERT INTO `product` (`PID`, `PType`, `PName`, `PPrice`, `Description`, `PQuantity`) VALUES 
(NULL, 'P', '3D Printer', '1800', '3D Printing with 100 different colors', '20');

INSERT INTO `product` (`PID`, `PType`, `PName`, `PPrice`, `Description`, `PQuantity`) VALUES 
(NULL, 'P', 'BWPrinter', '150', 'Black and White Printer with Ink', '15');

INSERT INTO `product` (`PID`, `PType`, `PName`, `PPrice`, `Description`, `PQuantity`) VALUES 
(NULL, 'A', 'Charger', '100', 'Laptop Charger', '10');

INSERT INTO `product` (`PID`, `PType`, `PName`, `PPrice`, `Description`, `PQuantity`) VALUES 
(NULL, 'A', 'Laptop Bag', '50', 'Laptop Bag Blue Color', '5');

INSERT INTO `product` (`PID`, `PType`, `PName`, `PPrice`, `Description`, `PQuantity`) VALUES 
(NULL, 'A', 'Screen Protector', '70', 'Screen protector for laptop and computer screens', '10');

INSERT INTO `product` (`PID`, `PType`, `PName`, `PPrice`, `Description`, `PQuantity`) VALUES 
(NULL, 'A', 'RAM', '200', '512 GB RAM', '20');

INSERT INTO `product` (`PID`, `PType`, `PName`, `PPrice`, `Description`, `PQuantity`) VALUES 
(NULL, 'A', 'Mouse', '75', 'Gaming Mouse', '15');

INSERT INTO `computer` (`PID`, `CPUType`) VALUES ('1', 'i5');
INSERT INTO `computer` (`PID`, `CPUType`) VALUES ('2', 'core2');
INSERT INTO `computer` (`PID`, `CPUType`) VALUES ('3', 'i5');
INSERT INTO `computer` (`PID`, `CPUType`) VALUES ('4', 'p4');
INSERT INTO `computer` (`PID`, `CPUType`) VALUES ('5', 'p2');

INSERT INTO `computer` (`PID`, `CPUType`) VALUES ('6', 'i5');
INSERT INTO `computer` (`PID`, `CPUType`) VALUES ('7', 'i3');
INSERT INTO `computer` (`PID`, `CPUType`) VALUES ('8', 'i7');
INSERT INTO `computer` (`PID`, `CPUType`) VALUES ('9', 'Core2');
INSERT INTO `computer` (`PID`, `CPUType`) VALUES ('10', 'AMD');

INSERT INTO `laptop` (`PID`, `BType`, `Weight`) VALUES ('6', '180', '2.0');
INSERT INTO `laptop` (`PID`, `BType`, `Weight`) VALUES ('7', '140', '2.5');
INSERT INTO `laptop` (`PID`, `BType`, `Weight`) VALUES ('8', '200', '3.0');
INSERT INTO `laptop` (`PID`, `BType`, `Weight`) VALUES ('9', '100', '1.0');
INSERT INTO `laptop` (`PID`, `BType`, `Weight`) VALUES ('10', '300', '5.0');

INSERT INTO `printer` (`PID`, `PrinterType`, `Resolution`) VALUES ('11', 'Inkjet', '1024x2048');
INSERT INTO `printer` (`PID`, `PrinterType`, `Resolution`) VALUES ('12', 'LaserJet', '1024x1024');
INSERT INTO `printer` (`PID`, `PrinterType`, `Resolution`) VALUES ('13', 'Plotter', '720x720');
INSERT INTO `printer` (`PID`, `PrinterType`, `Resolution`) VALUES ('14', '3D', '2048x2048');
INSERT INTO `printer` (`PID`, `PrinterType`, `Resolution`) VALUES ('15', 'Thermal', '1024x720');



INSERT INTO `offer_product` (`PID`, `OfferPrice`) VALUES ('3', '650');

INSERT INTO `offer_product` (`PID`, `OfferPrice`) VALUES ('4', '300');

INSERT INTO `offer_product` (`PID`, `OfferPrice`) VALUES ('5', '100');

INSERT INTO `offer_product` (`PID`, `OfferPrice`) VALUES ('6', '950');

INSERT INTO `offer_product` (`PID`, `OfferPrice`) VALUES ('7', '1000');

