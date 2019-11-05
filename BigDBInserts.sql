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





