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

