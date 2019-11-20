
/*********** Dialogue Queries ***********/
-- get default dialogue for the character being talked to
-- insert the personID from the dropdown selection
SELECT Phrase 
FROM People, DialogueOptions
WHERE People.DialogueID = DialogueOptions.DialogueID
AND PersonID = 3;

-- get item hint for a specific person
SELECT Phrase
FROM People, Items, DialogueOptions
WHERE People.ItemID = Items.ItemID
AND Items.ItemHintID = DialogueOptions.DialogueID
AND People.PersonID = 3;

-- get phrase for specific "will take item"
-- will get person and ID pairing from dropdown select
SELECT Phrase
FROM WillTakeItem, DialogueOptions
WHERE WillTakeItem.DialogueID=DialogueOptions.DialogueID
AND PersonID = 3
AND ItemID = 1;


/*********** Image Queries ***********/ -- untested pls don't look at yet
-- get image for a specific item
SELECT Image
FROM Items INNER JOIN Images ON Items.ImageID=Images.ImageID
WHERE ItemID= 1;

-- get image for a specific person

SELECT Image
FROM People INNER JOIN Images ON People.PictureID = Images.ImageID
WHERE PersonID = 1;


--  get images for all the people you gave an item 
-- to and the number of friends you made for scoring purposes (for the end screen all your friends)

SELECT Images.ImageID, Image, COUNT (People.PersonID)
FROM Gives, People, Images
WHERE Gives.PersonID=People.PersonID
AND People.PictureID=Images.ImageID
AND PlayerID=1;

-- get the images for all the items in a players inventory

SELECT Image
FROM PlayerItems, Items, Images
WHERE PlayerItems.ItemID=Items.ItemID
AND Items.ImageID=Images.ImageID
AND PlayerID=1;


-- get all the pictures for items in a given room
SELECT Image 
FROM RoomItems, Items, Images
WHERE RoomItems.ItemID=Items.ItemID
AND Items.ImageID=Images.ImageID
AND RoomID = 1; -- subquery? (and is not in Gives with player ID whatever the player’s ID is, affected by take all?)

-- get the images for a specific printer

SELECT Image
FROM Printers INNER JOIN Images ON Printers.ImageID=Images.ImageID
WHERE PrinterID = 1;

-- get the images for the people in a room?
-- need a roompeople table?

-- what buildings are adjacent to this one?
SELECT AdjacentBuildingID, Name 
FROM Buildings INNER JOIN AdjacentBuildings ON Buildings.BuildingID=  
 AdjacentBuildings.BuildingID, Buildings AS AdjBuildings
WHERE AdjBuildings.BuildingID = AdjacentBuildings.BuildingID
AND BuildingID = 1; -- oof yikes

INSERT INTO Users(Username, Password, Salt, CreatedOn)
VALUES (:user,:pass,:salt,:created);

-- Generate a list of all classnames for dropdown menu
SELECT DISTINCT Name 
FROM Classes;

-- Select all professors id, fname, and lname
SELECT Professors.ProfID, FName, LName 
FROM Professors, People 
WHERE Professors.ProfID = People.PersonID;

-- Get the users ID for faster lookup
SELECT UserID 
FROM Users 
WHERE
Username = :user;

-- What professors teach this class?
SELECT ProfID, Name 
FROM Classes 
WHERE ProfID = :profID 
AND Classes.Name = :className;

-- Login query
SELECT * 
FROM Users 
WHERE Username = :user and Password = :pass;
