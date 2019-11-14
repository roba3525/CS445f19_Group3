-- building inserts (just name)

INSERT INTO Buildings (Name) VALUES ("Cascade"); --1
INSERT INTO Buildings (Name) VALUES ("Strain"); --2
INSERT INTO Buildings (Name) VALUES ("Price"); --3
INSERT INTO Buildings (Name) VALUES ("Library"); --4
INSERT INTO Buildings (Name) VALUES ("Marsh"); --5
INSERT INTO Buildings (Name) VALUES ("Scott"); --6
INSERT INTO Buildings (Name) VALUES ("UC"); --7

-- rooms inserts (name, buildingid)

--cascade
INSERT INTO Rooms (Name, BuildingID) VALUES ("Lobby", 1);
INSERT INTO Rooms (Name, BuildingID) VALUES ("1st Floor Lounge", 1);

--strain
INSERT INTO Rooms (Name, BuildingID) VALUES ("Strain 222", 2);
INSERT INTO Rooms (Name, BuildingID) VALUES ("Shereen's Office", 2);
INSERT INTO Rooms (Name, BuildingID) VALUES ("Doug's Office", 2);
INSERT INTO Rooms (Name, BuildingID) VALUES ("Chadd's Office", 2);

--price
INSERT INTO Rooms (Name, BuildingID) VALUES ("Chris Lane's Office", 3);
INSERT INTO Rooms (Name, BuildingID) VALUES ("Math Lab");

--library
INSERT INTO Rooms (Name, BuildingID) VALUES ("Front Desk", 4);
INSERT INTO Rooms (Name, BuildingID) VALUES ("24 Hour Room", 4);
INSERT INTO Rooms (Name, BuildingID) VALUES ("Conference Room", 4);

--marsh
INSERT INTO Rooms (Name, BuildingID) VALUES ("Marsh Lab", 5);
INSERT INTO Rooms (Name, BuildingID) VALUES ("The TIC", 5);
INSERT INTO Rooms (Name, BuildingID) VALUES ("Hallick's Office", 5);

--scott
INSERT INTO Rooms (Name, BuildingID) VALUES ("Boxer Food Share", 6);
INSERT INTO Rooms (Name, BuildingID) VALUES ("Scott 204", 6);
INSERT INTO Rooms (Name, BuildingID) VALUES ("Scott 218", 6);

--the uc
INSERT INTO Rooms (Name, BuildingID) VALUES ("The Pod", 7);
INSERT INTO Rooms (Name, BuildingID) VALUES ("The Mailroom", 7);
INSERT INTO Rooms (Name, BuildingID) VALUES ("The Grove", 7);


-- --- adjacent buildings (BuildingID, AdjacentBuildingID)
--adjacent to cascade
INSERT INTO AdjacentBuildings (BuildingID, AdjacentBuildingID) VALUES (1, 2);

--adjacent to strain
INSERT INTO AdjacentBuildings (BuildingID, AdjacentBuildingID) VALUES (2, 1); -- repeat
INSERT INTO AdjacentBuildings (BuildingID, AdjacentBuildingID) VALUES (2, 3);

--adjacent to price
INSERT INTO AdjacentBuildings (BuildingID, AdjacentBuildingID) VALUES (3, 2); -- repeat
INSERT INTO AdjacentBuildings (BuildingID, AdjacentBuildingID) VALUES (3, 4); 
INSERT INTO AdjacentBuildings (BuildingID, AdjacentBuildingID) VALUES (3, 7);

--adjacent to library
INSERT INTO AdjacentBuildings (BuildingID, AdjacentBuildingID) VALUES (4, 3); -- repeat
INSERT INTO AdjacentBuildings (BuildingID, AdjacentBuildingID) VALUES (4, 7);
INSERT INTO AdjacentBuildings (BuildingID, AdjacentBuildingID) VALUES (4, 5);

--adjacent to marsh
INSERT INTO AdjacentBuildings (BuildingID, AdjacentBuildingID) VALUES (5, 4); --repeat
INSERT INTO AdjacentBuildings (BuildingID, AdjacentBuildingID) VALUES (5, 6);

--adjacent to scott
INSERT INTO AdjacentBuildings (BuildingID, AdjacentBuildingID) VALUES (6, 5); --repeat
INSERT INTO AdjacentBuildings (BuildingID, AdjacentBuildingID) VALUES (6, 7);

--adjacent to the uc
INSERT INTO AdjacentBuildings (BuildingID, AdjacentBuildingID) VALUES (7, 6); --repeat
INSERT INTO AdjacentBuildings (BuildingID, AdjacentBuildingID) VALUES (7, 4); --repeat
INSERT INTO AdjacentBuildings (BuildingID, AdjacentBuildingID) VALUES (7, 3); --repeat

--image inserts
-- item icons
INSERT INTO Images (Image, Type) -- 1
VALUES (LOAD_FILE('/tmp/g3/Pictures/g3DBPhotos/Doritos.png'), "mime/png");

INSERT INTO Images (Image, Type) -- 2
VALUES (LOAD_FILE('/tmp/g3/Pictures/g3DBPhotos/Pokeball.png'), "mime/png");

INSERT INTO Images (Image, Type) -- 3
VALUES (LOAD_FILE('/tmp/g3/Pictures/g3DBPhotos/Stapler.png'), "mime/png");

INSERT INTO Images (Image, Type) -- 4
VALUES (LOAD_FILE('/tmp/g3/Pictures/g3DBPhotos/SSD.png'), "mime/png");

INSERT INTO Images (Image, Type) -- 5
VALUES (LOAD_FILE('/tmp/g3/Pictures/g3DBPhotos/Lightsaber.png'), "mime/png");

INSERT INTO Images (Image, Type) -- 6
VALUES (LOAD_FILE('/tmp/g3/Pictures/g3DBPhotos/Charger.png'), "mime/png");

INSERT INTO Images (Image, Type) -- 7
VALUES (LOAD_FILE('/tmp/g3/Pictures/g3DBPhotos/Marker.png'), "mime/png");

INSERT INTO Images (Image, Type) -- 8
VALUES (LOAD_FILE('/tmp/g3/Pictures/g3DBPhotos/Semicolon.png'), "mime/png");

INSERT INTO Images (Image, Type) -- 9
VALUES (LOAD_FILE('/tmp/g3/Pictures/g3DBPhotos/WICSTee.png'), "mime/png");

INSERT INTO Images (Image, Type) -- 10
VALUES (LOAD_FILE('/tmp/g3/Pictures/g3DBPhotos/Corn.png'), "mime/png");

INSERT INTO Images (Image, Type) -- 11
VALUES (LOAD_FILE('/tmp/g3/Pictures/g3DBPhotos/WateringCan'), "mime/png");

-- cs people icons
--chadd
INSERT INTO Images (Image, type) -- 12
VALUES (LOAD_FILE('/tmp/g3/Pictures/csdeptpeoplepics/chadd2.png'), "mime/png");
--cooper
INSERT INTO Images (Image, type) -- 13
VALUES (LOAD_FILE('/tmp/g3/Pictures/csdeptpeoplepics/cooper.png', "mime/png");
--larry
INSERT INTO Images (Image, type) -- 14
VALUES (LOAD_FILE('/tmp/g3/Pictures/csdeptpeoplepics/larry.png'), "mime/png");
--sam
INSERT INTO Images (Image, type)-- 15
VALUES (LOAD_FILE('/tmp/g3/Pictures/csdeptpeoplepics/sam.png'), "mime/png");
--doug
INSERT INTO Images (Image, type)-- 16
VALUES (LOAD_FILE('/tmp/g3/Pictures/csdeptpeoplepics/doug.png'), "mime/png");
--megan
INSERT INTO Images (Image, type)-- 17
VALUES (LOAD_FILE('/tmp/g3/Pictures/csdeptpeoplepics/megan.png'), "mime/png");
--shereen
INSERT INTO Images (Image, type) -- 18
VALUES (LOAD_FILE('/tmp/g3/Pictures/csdeptpeoplepics/shereen.png'), "mime/png");
--chris lane
INSERT INTO Images (Image, type) -- 19
VALUES (LOAD_FILE('/tmp/g3/Pictures/csdeptpeoplepics/chrislane.png'), "mime/png");
--julian
INSERT INTO Images (Image, type) -- 20
VALUES (LOAD_FILE('/tmp/g3/Pictures/csdeptpeoplepics/julian.png'), "mime/png");
--mystery student
INSERT INTO Images (Image, type) -- 21
VALUES (LOAD_FILE('/tmp/g3/Pictures/csdeptpeoplepics/mysterystudent.png'), "mime/png");
--thomas
INSERT INTO Images (Image, type) -- 22
VALUES (LOAD_FILE('/tmp/g3/Pictures/csdeptpeoplepics/thomas.png'), "mime/png");
--sarah
INSERT INTO Images (Image, type) -- 23
VALUES (LOAD_FILE('/tmp/g3/Pictures/csdeptpeoplepics/sarah.png'), "mime/png");
--audrey
INSERT INTO Images (Image, type) -- 24
VALUES (LOAD_FILE('/tmp/g3/Pictures/csdeptpeoplepics/audrey.png'), "mime/png");
-- chugg
INSERT INTO Images (Image, type) -- 25
VALUES (LOAD_FILE('/tmp/g3/Pictures/csdeptpeoplepics/chuggforgame.png'), "mime/png");

-- printer photo
INSERT INTO Images (Image, type) -- 26
VALUES (LOAD_FILE('/tmp/g3/Pictures/g3DBPhotos/printer.PNG'), "mime/png");


--item inserts
INSERT INTO Items (Name, Weight, ImageID, ItemHintID)
VALUES ("Doritos", 1, 1, 1);

INSERT INTO Items (Name, Weight, ImageID, ItemHintID)
VALUES ("Pokeball", 1, 2, 2);

INSERT INTO Items (Name, Weight, ImageID, ItemHintID)
VALUES ("Stapler", 1, 3, 3);

INSERT INTO Items (Name, Weight, ImageID, ItemHintID)
VALUES ("SSD", 1, 4, 4);

INSERT INTO Items (Name, Weight, ImageID, ItemHintID)
VALUES ("Lightsaber", 1, 5, 5);

INSERT INTO Items (Name, Weight, ImageID, ItemHintID)
VALUES ("Phone Charger", 1, 6, 6);

INSERT INTO Items (Name, Weight, ImageID, ItemHintID)
VALUES ("Whiteboard Marker", 1, 7, 7);

INSERT INTO Items (Name, Weight, ImageID, ItemHintID)
VALUES ("Semicolon Keycap", 1, 8, 8);

INSERT INTO Items (Name, Weight, ImageID, ItemHintID)
VALUES ("WICS Tee", 1, 9, 9);

INSERT INTO Items (Name, Weight, ImageID, ItemHintID)
VALUES ("Ear of Corn", 1, 10, 10);

INSERT INTO Items (Name, Weight, ImageID, ItemHintID)
VALUES ("Watering Can", 1, 11, 11);


-- printer (just one for now)
INSERT INTO Printers (Name, ImageID, RoomID) VALUES ("The TIC", 26 ,5);

--we inserting npc's (people, professors, students)
-- people
-- shereen
 INSERT INTO People (FName, LName, DialogueID, ItemID, PrinterID, PictureID)
 VALUES (Shereen, Khoja, 13, 7, 1, 18);

-- chadd
 INSERT INTO People (FName, LName, DialogueID, ItemID, PrinterID, PictureID)
 VALUES (Chadd, Williams, 12, 5, 1, 12); 

-- doug
 INSERT INTO People (FName, LName, DialogueID, ItemID, PrinterID, PictureID)
 VALUES (Doug, Ryan, 14, 10, 1, 16); 

-- chris lane
 INSERT INTO People (FName, LName, DialogueID, ItemID, PrinterID, PictureID)
 VALUES (Chris, Lane, 15, 9, 1, 19); 

-- audrey 
 INSERT INTO People (FName, LName, DialogueID, ItemID, PrinterID, PictureID)
 VALUES (Audrey, Lincoln, 20, 11, 1, 24); 

-- cooper
 INSERT INTO People (FName, LName, DialogueID, ItemID, PrinterID, PictureID)
 VALUES (Cooper, Delay, 23, 1, 1, 13); 

--sam
 INSERT INTO People (FName, LName, DialogueID, ItemID, PrinterID, PictureID)
 VALUES (Sam, Sindt, 21, 8, 1, 15); 

-- julian
INSERT INTO People (FName, LName, DialogueID, ItemID, PrinterID, PictureID)
VALUES (Julian, Bunch, 19, 6, 1, 20);

-- thomas
 INSERT INTO People (FName, LName, DialogueID, ItemID, PrinterID, PictureID) 
 VALUES (Thomas, Robasciotti, 18, 3, 1, 22); 

-- mystery student
 INSERT INTO People (FName, LName, DialogueID, ItemID, PrinterID, PictureID) 
 VALUES (Mystery, Student, 24, 4, 1, 21); 

-- megan
 INSERT INTO People (FName, LName, DialogueID, ItemID, PrinterID, PictureID)
 VALUES (Megan, DeYoung, 17, 4, 1, 17); 

-- chougg
 INSERT INTO People (FName, LName, DialogueID, ItemID, PrinterID, PictureID)
 VALUES (Chugg, Ryams, 25, 1, 1, 25); 

-- larry
 INSERT INTO People (FName, LName, DialogueID, ItemID, PrinterID, PictureID)
 VALUES (Larry, Jensen, 22, 2, 1, 14);

--sarah
 INSERT INTO People (FName, LName, DialogueID, ItemID, PrinterID, PictureID)
 VALUES (Sarah, Amano, 16, 2, 1, 23);


-- Professors
INSERT INTO Professors (ProfID) VALUES (1); --shereen
INSERT INTO Professors (ProfID) VALUES (2); -- chadd
INSERT INTO Professors (ProfID) VALUES (3); -- doug
INSERT INTO Professors (ProfID) VALUES (4); -- CL

-- Students
--INSERT INTO Students (StudentID, RankID) VALUES (5, );
--INSERT INTO Students (StudentID, RankID) VALUES (6, );
--INSERT INTO Students (StudentID, RankID) VALUES (7, );
--INSERT INTO Students (StudentID, RankID) VALUES (8, );
--INSERT INTO Students (StudentID, RankID) VALUES (9, );
--INSERT INTO Students (StudentID, RankID) VALUES (10, );
--INSERT INTO Students (StudentID, RankID) VALUES (11, );
--INSERT INTO Students (StudentID, RankID) VALUES (13, );
--INSERT INTO Students (StudentID, RankID) VALUES (14, );

--Assignments
-- INSERT INTO Assignments (AssignmentNumber, Title, DueDate) VALUES (1, "Craps", '2019-11-19');
-- INSERT INTO Assignments (AssignmentNumber, Title, DueDate) VALUES (3, "Hash Table", '2019-11-26');
-- INSERT INTO Assignments (AssignmentNumber, Title, DueDate) VALUES (5, "Sprint Report", '2019-11-20');
--INSERT INTO Assignments (AssignmentNumber, Title, DueDate) VALUES (7, "Hall of Fame and Shame", '2019-11-24');
--INSERT INTO Assignments (AssignmentNumber, Title, DueDate) VALUES (2, "ER Diagram", '2019-11-20');

-- Classes
--INSERT INTO Classes (Name, RoomID, ProfID, AssignmentID) VALUES ("CS 150: Intro to Computer Science", 12, 4, 1);
--INSERT INTO Classes (Name, RoomID, ProfID, AssignmentID) VALUES ("CS 150: Intro to Computer Science", 12, 3, 1);
--INSERT INTO Classes (Name, RoomID, ProfID, AssignmentID) VALUES ("CS 300: DataStructures", 16, 2, 2);
--INSERT INTO Classes (Name, RoomID, ProfID, AssignmentID) VALUES ("CS 493: Capstone", 4, 1, 3);
--INSERT INTO Classes (Name, RoomID, ProfID, AssignmentID) VALUES ("CS 315: HCI", 20, 1, 4);
--INSERT INTO Classes (Name, RoomID, ProfID, AssignmentID) VALUES ("CS 445: Databases", 6, 2, );



--Will Take Item
--INSERT INTO WillTakeItem (PersonID, ItemID, RoomID) VALUES (11, 7, );
--INSERT INTO WillTakeItem ()








































