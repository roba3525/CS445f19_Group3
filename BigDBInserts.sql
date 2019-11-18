
-- building inserts (just name)

INSERT INTO Buildings (Name) VALUES ("Cascade");  -- 1
INSERT INTO Buildings (Name) VALUES ("Strain"); -- 2
INSERT INTO Buildings (Name) VALUES ("Price"); -- 3
INSERT INTO Buildings (Name) VALUES ("Library"); -- 4
INSERT INTO Buildings (Name) VALUES ("Marsh"); -- 5
INSERT INTO Buildings (Name) VALUES ("Scott"); -- 6
INSERT INTO Buildings (Name) VALUES ("UC"); -- 7

-- rooms inserts (name, buildingid)

-- cascade
INSERT INTO Rooms (Name, BuildingID) VALUES ("Lobby", 1);
INSERT INTO Rooms (Name, BuildingID) VALUES ("1st Floor Lounge", 1);

-- strain
INSERT INTO Rooms (Name, BuildingID) VALUES ("Strain 222", 2);
INSERT INTO Rooms (Name, BuildingID) VALUES ("Shereen's Office", 2);
INSERT INTO Rooms (Name, BuildingID) VALUES ("Doug's Office", 2);
INSERT INTO Rooms (Name, BuildingID) VALUES ("Chadd's Office", 2);

-- price
INSERT INTO Rooms (Name, BuildingID) VALUES ("Chris Lane's Office", 3);
INSERT INTO Rooms (Name, BuildingID) VALUES ("Math Lab", 3);

-- library
INSERT INTO Rooms (Name, BuildingID) VALUES ("Front Desk", 4);
INSERT INTO Rooms (Name, BuildingID) VALUES ("24 Hour Room", 4);
INSERT INTO Rooms (Name, BuildingID) VALUES ("Conference Room", 4);

-- marsh,
INSERT INTO Rooms (Name, BuildingID) VALUES ("Marsh Lab", 5);
INSERT INTO Rooms (Name, BuildingID) VALUES ("The TIC", 5);
INSERT INTO Rooms (Name, BuildingID) VALUES ("Hallick's Office", 5);

-- scott
INSERT INTO Rooms (Name, BuildingID) VALUES ("Boxer Food Share", 6);
INSERT INTO Rooms (Name, BuildingID) VALUES ("Scott 204", 6);
INSERT INTO Rooms (Name, BuildingID) VALUES ("Scott 218", 6);

-- the uc
INSERT INTO Rooms (Name, BuildingID) VALUES ("The Pod", 7);
INSERT INTO Rooms (Name, BuildingID) VALUES ("The Mailroom", 7);
INSERT INTO Rooms (Name, BuildingID) VALUES ("The Grove", 7);


-- --- adjacent buildings (BuildingID, AdjacentBuildingID)
-- adjacent to cascade
INSERT INTO AdjacentBuildings (BuildingID, AdjacentBuildingID) VALUES (1, 2);

-- adjacent to strain
INSERT INTO AdjacentBuildings (BuildingID, AdjacentBuildingID) VALUES (2, 1); -- repeat
INSERT INTO AdjacentBuildings (BuildingID, AdjacentBuildingID) VALUES (2, 3);

-- adjacent to price
INSERT INTO AdjacentBuildings (BuildingID, AdjacentBuildingID) VALUES (3, 2); -- repeat
INSERT INTO AdjacentBuildings (BuildingID, AdjacentBuildingID) VALUES (3, 4); 
INSERT INTO AdjacentBuildings (BuildingID, AdjacentBuildingID) VALUES (3, 7);

-- adjacent to library
INSERT INTO AdjacentBuildings (BuildingID, AdjacentBuildingID) VALUES (4, 3); -- repeat
INSERT INTO AdjacentBuildings (BuildingID, AdjacentBuildingID) VALUES (4, 7);
INSERT INTO AdjacentBuildings (BuildingID, AdjacentBuildingID) VALUES (4, 5);

-- adjacent to marsh
INSERT INTO AdjacentBuildings (BuildingID, AdjacentBuildingID) VALUES (5, 4); -- repeat
INSERT INTO AdjacentBuildings (BuildingID, AdjacentBuildingID) VALUES (5, 6);

-- adjacent to scott
INSERT INTO AdjacentBuildings (BuildingID, AdjacentBuildingID) VALUES (6, 5); -- repeat
INSERT INTO AdjacentBuildings (BuildingID, AdjacentBuildingID) VALUES (6, 7);

-- adjacent to the uc
INSERT INTO AdjacentBuildings (BuildingID, AdjacentBuildingID) VALUES (7, 6); -- repeat
INSERT INTO AdjacentBuildings (BuildingID, AdjacentBuildingID) VALUES (7, 4); -- repeat
INSERT INTO AdjacentBuildings (BuildingID, AdjacentBuildingID) VALUES (7, 3); -- repeat

-- image inserts
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
VALUES (LOAD_FILE('/tmp/g3/Pictures/g3DBPhotos/WateringCan.png'), "mime/png");

-- cs people icons
-- chadd
INSERT INTO Images (Image, Type) -- 12
VALUES (LOAD_FILE('/tmp/g3/Pictures/csdeptpeoplepics/chadd2.png'), "mime/png");
-- cooper
INSERT INTO Images (Image, Type) -- 13
VALUES (LOAD_FILE('/tmp/g3/Pictures/csdeptpeoplepics/cooper.png'), "mime/png");
-- larry
INSERT INTO Images (Image, Type) -- 14
VALUES (LOAD_FILE('/tmp/g3/Pictures/csdeptpeoplepics/larry.png'), "mime/png");
-- sam
INSERT INTO Images (Image, Type)-- 15
VALUES (LOAD_FILE('/tmp/g3/Pictures/csdeptpeoplepics/sam.png'), "mime/png");
-- doug
INSERT INTO Images (Image, Type)-- 16
VALUES (LOAD_FILE('/tmp/g3/Pictures/csdeptpeoplepics/doug.png'), "mime/png");
-- megan
INSERT INTO Images (Image, Type)-- 17
VALUES (LOAD_FILE('/tmp/g3/Pictures/csdeptpeoplepics/megan.png'), "mime/png");
-- shereen
INSERT INTO Images (Image, Type) -- 18
VALUES (LOAD_FILE('/tmp/g3/Pictures/csdeptpeoplepics/shereen.png'), "mime/png");
-- chris lane
INSERT INTO Images (Image, Type) -- 19
VALUES (LOAD_FILE('/tmp/g3/Pictures/csdeptpeoplepics/chrislane.png'), "mime/png");
-- julian
INSERT INTO Images (Image, Type) -- 20
VALUES (LOAD_FILE('/tmp/g3/Pictures/csdeptpeoplepics/julian.png'), "mime/png");
-- mystery student
INSERT INTO Images (Image, Type) -- 21
VALUES (LOAD_FILE('/tmp/g3/Pictures/csdeptpeoplepics/mysterystudent.png'), "mime/png");
-- thomas
INSERT INTO Images (Image, Type) -- 22
VALUES (LOAD_FILE('/tmp/g3/Pictures/csdeptpeoplepics/thomas.png'), "mime/png");
-- sarah
INSERT INTO Images (Image, Type) -- 23
VALUES (LOAD_FILE('/tmp/g3/Pictures/csdeptpeoplepics/sarah.png'), "mime/png");
-- audrey
INSERT INTO Images (Image, Type) -- 24
VALUES (LOAD_FILE('/tmp/g3/Pictures/csdeptpeoplepics/audrey.png'), "mime/png");
-- chugg
INSERT INTO Images (Image, Type) -- 25
VALUES (LOAD_FILE('/tmp/g3/Pictures/csdeptpeoplepics/chuggforgame.png'), "mime/png");

-- printer photo
INSERT INTO Images (Image, Type) -- 26
VALUES (LOAD_FILE('/tmp/g3/Pictures/g3DBPhotos/printer.PNG'), "mime/png");

-- dialogue
/********** Items ***********/
-- Doritos (1)
INSERT INTO DialogueOptions (Phrase)
VALUES ("I’ve been eating so much broccoli and kale lately. I need some real food.");

-- Pokeball (2)
INSERT INTO DialogueOptions (Phrase)
VALUES ("Every morning I see a bulbasaur outside my window. I wish I had something to catch it with.");

-- Stapler (3)
INSERT INTO DialogueOptions (Phrase)
VALUES ("Dang it! I didn’t think my assignment would take up two pieces of paper. There’s only one line of code on the second sheet.");

-- SSD (4)
INSERT INTO DialogueOptions (Phrase)
VALUES ("So much data… Lost… All alone… I really should’ve written my name on it.");

-- Lightsaber (5)
INSERT INTO DialogueOptions (Phrase)
VALUES ("Obi Wan is not gonna be happy with me.");

-- Phone Charger (6)
INSERT INTO DialogueOptions (Phrase)
VALUES ("My phone has been at 1% for 20 minutes now and I still have two more classes right after this.");

-- Whiteboard Marker (7)
INSERT INTO DialogueOptions (Phrase)
VALUES ("Have you seen those drawings in the Scott lab? I wish I could start making drawings like that.");

-- Semicolon Keycap (8)
INSERT INTO DialogueOptions (Phrase)
VALUES ("My keyboard is missing a key and it’s been really annoying when I have to code.");

-- WICS Tee (9)
INSERT INTO DialogueOptions (Phrase)
VALUES ("I’m missing my uniform for the coding competition Saturday. The squad is gonna be mad at me if I don’t find it soon.");

-- Ear of Corn (10)
INSERT INTO DialogueOptions (Phrase)
VALUES ("I can’t believe the farmers market is closed.");

-- Watering Can (11)
INSERT INTO DialogueOptions (Phrase)
VALUES ("It hasn’t rained in twenty minutes. I’m worried my apple tree is thirsty.");


/*********** People ***********/
-- Chadd (12)
INSERT INTO DialogueOptions (Phrase)
VALUES ("PHP's not that bad. It's just the worst of all worlds.");

-- Shereen (13)
INSERT INTO DialogueOptions (Phrase)
VALUES ("Gamers are people too.");

-- Doug (14)
INSERT INTO DialogueOptions (Phrase)
VALUES ("You're toast.");

-- Chris (15)
INSERT INTO DialogueOptions (Phrase)
VALUES ("Such is life.");

-- Julian (16)
INSERT INTO DialogueOptions (Phrase)
VALUES ("Assignment? Really complicated? Due today? Welp...");

-- Megan (17)
INSERT INTO DialogueOptions (Phrase)
VALUES ("Vibe check.");

-- Thomas (18)
INSERT INTO DialogueOptions (Phrase)
VALUES ("I love beanies!");

-- Sarah (19)
INSERT INTO DialogueOptions (Phrase)
VALUES ("Zzzzz...");

-- Audrey (20)
INSERT INTO DialogueOptions (Phrase)
VALUES ("I am so excited for class!");

-- Sam (21)
INSERT INTO DialogueOptions (Phrase)
VALUES ("My brain is fried from all these practice interview problems.");

-- Larry (22)
INSERT INTO DialogueOptions (Phrase)
VALUES ("Uhhhh, ok.");

-- Cooper (23)
INSERT INTO DialogueOptions (Phrase)
VALUES ("Holy cow I made it into the game!");

-- Mystery student (24)
INSERT INTO DialogueOptions (Phrase)
VALUES ("~`Inv^#alid @>`>^");

-- Choug (25)
INSERT INTO DialogueOptions (Phrase)
VALUES ("What... am I?");

-- julians (end at 25)
INSERT INTO DialogueOptions (Phrase)
VALUES ("I mean I'll take this...Thanks!"); -- 26

INSERT INTO DialogueOptions (Phrase)
VALUES ("Go get some real food...");

INSERT INTO DialogueOptions (Phrase)
VALUES ("If only this was a Harry Potter wand!");

INSERT INTO DialogueOptions (Phrase)
VALUES ("Corn is good, but watermelon is better!");

INSERT INTO DialogueOptions (Phrase)
VALUES ("I've already stapled and turned in my assignment");

INSERT INTO DialogueOptions (Phrase)
VALUES ("I have an Android, sorry.");

INSERT INTO DialogueOptions (Phrase)
VALUES ("I'm not helping you with that corrupt SSD. I'm off the clock!");

INSERT INTO DialogueOptions (Phrase)
VALUES ("Oh! You must have heard about my databases project!");

INSERT INTO DialogueOptions (Phrase)
VALUES ("Nice.. maybe now my code will build.");

INSERT INTO DialogueOptions (Phrase)
VALUES ("That's a little dangerous, isn't it?");

INSERT INTO DialogueOptions (Phrase)
VALUES ("`~~~~<^%%% [REDACTED]``//>,**");

INSERT INTO DialogueOptions (Phrase)
VALUES ("I can't even see this marker's juice...");

INSERT INTO DialogueOptions (Phrase)
VALUES ("I grew up in a Star Trek household...");

INSERT INTO DialogueOptions (Phrase)
VALUES ("hmmmmmmmm");

INSERT INTO DialogueOptions (Phrase)
VALUES ("Can I make tea with this water?");

INSERT INTO DialogueOptions (Phrase)
VALUES ("o7");

INSERT INTO DialogueOptions (Phrase)
VALUES ("Did Audrey put you up to this?? My plants are still technically alive!");

-- item inserts
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

-- we inserting npc's (people, professors, students)
-- people
-- shereen
 INSERT INTO People (FName, LName, DialogueID, ItemID, PrinterID, PictureID)
 VALUES ("Shereen", "Khoja", 13, 7, 1, 18);

-- chadd
 INSERT INTO People (FName, LName, DialogueID, ItemID, PrinterID, PictureID)
 VALUES ("Chadd", "Williams", 12, 5, 1, 12); 

-- doug
 INSERT INTO People (FName, LName, DialogueID, ItemID, PrinterID, PictureID)
 VALUES ("Doug", "Ryan", 14, 10, 1, 16); 

-- chris lane
 INSERT INTO People (FName, LName, DialogueID, ItemID, PrinterID, PictureID)
 VALUES ("Chris", "Lane", 15, 9, 1, 19); 

-- audrey 
 INSERT INTO People (FName, LName, DialogueID, ItemID, PrinterID, PictureID)
 VALUES ("Audrey", "Lincoln", 20, 11, 1, 24); 

-- cooper
 INSERT INTO People (FName, LName, DialogueID, ItemID, PrinterID, PictureID)
 VALUES ("Cooper", "Delay", 23, 1, 1, 13); 

-- sam
 INSERT INTO People (FName, LName, DialogueID, ItemID, PrinterID, PictureID)
 VALUES ("Sam", "Sindt", 21, 8, 1, 15); 

-- julian
INSERT INTO People (FName, LName, DialogueID, ItemID, PrinterID, PictureID)
VALUES ("Julian", "Bunch", 16, 6, 1, 20);

-- thomas
 INSERT INTO People (FName, LName, DialogueID, ItemID, PrinterID, PictureID) 
 VALUES ("Thomas", "Robasciotti", 18, 3, 1, 22); 

-- mystery student
 INSERT INTO People (FName, LName, DialogueID, ItemID, PrinterID, PictureID) 
 VALUES ("Mystery", "Student", 24, 4, 1, 21); 

-- megan
 INSERT INTO People (FName, LName, DialogueID, ItemID, PrinterID, PictureID)
 VALUES ("Megan", "DeYoung", 17, 4, 1, 17); 

-- chougg
 INSERT INTO People (FName, LName, DialogueID, ItemID, PrinterID, PictureID)
 VALUES ("Chugg", "Ryams", 25, 1, 1, 25); 

-- larry
 INSERT INTO People (FName, LName, DialogueID, ItemID, PrinterID, PictureID)
 VALUES ("Larry", "Jensen", 22, 2, 1, 14);

-- sarah
 INSERT INTO People (FName, LName, DialogueID, ItemID, PrinterID, PictureID)
 VALUES ("Sarah", "Amano", 19, 2, 1, 23);

-- ranks
INSERT INTO Ranks (Rank) VALUES ("Freshman");
INSERT INTO Ranks (Rank) VALUES ("Sophomore");
INSERT INTO Ranks (Rank) VALUES ("Junior");
INSERT INTO Ranks (Rank) VALUES ("Senior");

-- Professors
INSERT INTO Professors (ProfID) VALUES (1); -- shereen
INSERT INTO Professors (ProfID) VALUES (2); -- chadd
INSERT INTO Professors (ProfID) VALUES (3); -- doug
INSERT INTO Professors (ProfID) VALUES (4); -- CL

-- Students
INSERT INTO Students (StudentID, RankID) VALUES (5, 3);
INSERT INTO Students (StudentID, RankID) VALUES (6, 3);
INSERT INTO Students (StudentID, RankID) VALUES (7, 3);
INSERT INTO Students (StudentID, RankID) VALUES (8, 3);
INSERT INTO Students (StudentID, RankID) VALUES (9, 4);
INSERT INTO Students (StudentID, RankID) VALUES (10, 1);
INSERT INTO Students (StudentID, RankID) VALUES (11, 3);
INSERT INTO Students (StudentID, RankID) VALUES (14, 4);

-- Assignments
INSERT INTO Assignments (AssignmentNumber, Title, DueDate) VALUES (1, "Craps", '2019-11-19');
INSERT INTO Assignments (AssignmentNumber, Title, DueDate) VALUES (3, "Hash Table", '2019-11-26');
INSERT INTO Assignments (AssignmentNumber, Title, DueDate) VALUES (5, "Sprint Report", '2019-11-20');
INSERT INTO Assignments (AssignmentNumber, Title, DueDate) VALUES (7, "Hall of Fame and Shame", '2019-11-24');
INSERT INTO Assignments (AssignmentNumber, Title, DueDate) VALUES (2, "ER Diagram", '2019-11-20');

-- Classes
INSERT INTO Classes (Name, RoomID, ProfID, AssignmentID) VALUES ("CS 150: Intro to Computer Science", 12, 4, 1);
INSERT INTO Classes (Name, RoomID, ProfID, AssignmentID) VALUES ("CS 150: Intro to Computer Science", 5, 3, 1);
INSERT INTO Classes (Name, RoomID, ProfID, AssignmentID) VALUES ("CS 300: DataStructures", 16, 2, 2);
INSERT INTO Classes (Name, RoomID, ProfID, AssignmentID) VALUES ("CS 493: Capstone", 4, 1, 3);
INSERT INTO Classes (Name, RoomID, ProfID, AssignmentID) VALUES ("CS 315: HCI", 20, 1, 4);
INSERT INTO Classes (Name, RoomID, ProfID, AssignmentID) VALUES ("CS 445: Databases", 6, 2, 5);

-- Will Take Item
-- shereen
INSERT INTO WillTakeItem (PersonID, ItemID, DialogueID) VALUES (1, 5, 28); 
INSERT INTO WillTakeItem (PersonID, ItemID, RoomID, DialogueID) VALUES (1, 9, 17, 26); -- unlocks Scott218 (WICS room)

-- chadd
INSERT INTO WillTakeItem (PersonID, ItemID, RoomID, DialogueID) VALUES (2, 4, 6, 26); -- unlocks his office
INSERT INTO WillTakeItem (PersonID, ItemID, RoomID, DialogueID) VALUES (2, 9, 12, 26); -- unlocks marsh lab
INSERT INTO WillTakeItem (PersonID, ItemID, DialogueID) VALUES (2, 11, 42); -- "did audrey put you up to this?" 
-- doug
INSERT INTO WillTakeItem (PersonID, ItemID, RoomID, DialogueID) VALUES (3, 1, 15, 27); -- unlocks boxer food share "you need to go get some real food"
INSERT INTO WillTakeItem (PersonID, ItemID, RoomID, DialogueID) VALUES (3, 9, 14, 26); -- unlocks hallick's office

-- chris lane
INSERT INTO WillTakeItem (PersonID, ItemID, RoomID, DialogueID) VALUES (4, 7, 10, 26); -- unlocks the 24 hour room
INSERT INTO WillTakeItem (PersonID, ItemID, RoomID, DialogueID) VALUES (4, 3, 20, 26); -- unlocks the grove

-- audrey
INSERT INTO WillTakeItem (PersonID, ItemID, RoomID, DialogueID) VALUES (5, 9, 17, 26); -- unlocks the WICS
INSERT INTO WillTakeItem (PersonID, ItemID, RoomID, DialogueID) VALUES (5, 10, 11, 29); 
INSERT INTO WillTakeItem (PersonID, ItemID, DialogueID) VALUES (5, 3, 30); -- "oh I've already stapled and turned in my assignment"

-- cooper
INSERT INTO WillTakeItem (PersonID, ItemID, DialogueID) VALUES (6, 6, 31);

-- sam
INSERT INTO WillTakeItem (PersonID, ItemID, DialogueID) VALUES (7, 4, 32);
INSERT INTO WillTakeItem (PersonID, ItemID, RoomID, DialogueID) VALUES (7, 2, 2, 33); -- pokeball

-- julian
INSERT INTO WillTakeItem (PersonID, ItemID, RoomID, DialogueID) VALUES (8, 8, 8, 34); 

-- thomas
INSERT INTO WillTakeItem (PersonID, ItemID, DialogueID) VALUES (9, 5, 35);

-- mystery student
INSERT INTO WillTakeItem (PersonID, ItemID, DialogueID) VALUES (10, 1, 36);
INSERT INTO WillTakeItem (PersonID, ItemID, DialogueID) VALUES (10, 2, 36);
INSERT INTO WillTakeItem (PersonID, ItemID, DialogueID) VALUES (10, 3, 36);
INSERT INTO WillTakeItem (PersonID, ItemID, DialogueID) VALUES (10, 5, 36);
INSERT INTO WillTakeItem (PersonID, ItemID, DialogueID) VALUES (10, 6, 36);
INSERT INTO WillTakeItem (PersonID, ItemID, DialogueID) VALUES (10, 7, 36);
INSERT INTO WillTakeItem (PersonID, ItemID, DialogueID) VALUES (10, 8, 36);
INSERT INTO WillTakeItem (PersonID, ItemID, DialogueID) VALUES (10, 9, 36);
INSERT INTO WillTakeItem (PersonID, ItemID, DialogueID) VALUES (10, 10, 36);
INSERT INTO WillTakeItem (PersonID, ItemID, DialogueID) VALUES (10, 11, 36);

-- megan
INSERT INTO WillTakeItem (PersonID, ItemID, RoomID, DialogueID) VALUES (11, 7, 16, 37);
INSERT INTO WillTakeItem (PersonID, ItemID, DialogueID) VALUES (11, 5, 38);

-- chougg
INSERT INTO WillTakeItem (PersonID, ItemID, RoomID, DialogueID) VALUES (12, 2, 5, 39);
INSERT INTO WillTakeItem (PersonID, ItemID, RoomID, DialogueID) VALUES (12, 4, 6, 39);

-- larry
INSERT INTO WillTakeItem (PersonID, ItemID, RoomID, DialogueID) VALUES (13, 11, 1, 40);

-- sarah
INSERT INTO WillTakeItem (PersonID, ItemID, RoomID, DialogueID) VALUES (14, 3, 7, 41);







































