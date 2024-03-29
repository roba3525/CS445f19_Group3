
CREATE TABLE Users (
  UserID INT NOT NULL AUTO_INCREMENT,
  Username VARCHAR(25) NOT NULL,
  Password VARBINARY(100) NOT NULL,
  Salt VARBINARY(50) NOT NULL,
  CreatedOn DATE NOT NULL,
  CONSTRAINT PK_Users PRIMARY KEY(UserID)
) Engine = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin;

CREATE TABLE Players (
  PlayerID INT NOT NULL AUTO_INCREMENT,
  CharacterName VARCHAR(25) NOT NULL,
  Score INT NOT NULL,
  UserID INT NOT NULL,
  CONSTRAINT PK_Players PRIMARY KEY(PlayerID),
  CONSTRAINT FK_Players_UserID FOREIGN KEY(UserID) REFERENCES Users(UserID)
) Engine = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin;

CREATE TABLE Images (
  ImageID INT NOT NULL AUTO_INCREMENT,
  Image BLOB NOT NULL,
  Type VARCHAR(25) NOT NULL,
  CONSTRAINT PK_Images PRIMARY KEY (ImageID)
) Engine = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin;

CREATE TABLE DialogueOptions (
  DialogueID INT NOT NULL AUTO_INCREMENT,
  Phrase LONGTEXT NOT NULL,
  CONSTRAINT PK_DialogueOptions PRIMARY KEY (DialogueID)
) Engine = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin;

CREATE TABLE Items (
  ItemID INT NOT NULL AUTO_INCREMENT,
  Name VARCHAR(25) NOT NULL,
  Weight INT NOT NULL,
  ImageID INT NOT NULL,
  ItemHintID INT NOT NULL,
  CONSTRAINT PK_Items PRIMARY KEY(ItemID),
  CONSTRAINT FK_Items_Images FOREIGN KEY(ImageID) REFERENCES Images(ImageID),
  CONSTRAINT FK_Items_Hint FOREIGN KEY(ItemHintID) REFERENCES DialogueOptions(DialogueID)
) Engine = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin;

CREATE TABLE Buildings(
  BuildingID INT NOT NULL AUTO_INCREMENT,
  Name VARCHAR(25) NOT NULL,
  CONSTRAINT PK_Buildings PRIMARY KEY(BuildingID),
  CONSTRAINT U_Name UNIQUE(Name)
) Engine = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin;

CREATE TABLE Rooms (
  RoomID INT NOT NULL AUTO_INCREMENT,
  Name VARCHAR(25) NOT NULL,
  BuildingID INT NOT NULL,
  CONSTRAINT PK_Rooms PRIMARY KEY(RoomID),
  CONSTRAINT FK_Rooms_Buildings FOREIGN KEY(BuildingID) REFERENCES Buildings(BuildingID)
) Engine = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin;

CREATE TABLE RoomItems(
  RoomID INT NOT NULL,
  ItemID INT NOT NULL,
  CONSTRAINT PK_RoomItems PRIMARY KEY(RoomID, ItemID),
  CONSTRAINT FK_RoomItems_RoomID FOREIGN KEY(RoomID) REFERENCES Rooms(RoomID),
  CONSTRAINT FK_RoomItems_ItemID FOREIGN KEY(ItemID) REFERENCES Items(ItemID),
  CONSTRAINT U_RoomItems_ItemID UNIQUE (ItemID)
) Engine = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin;

CREATE TABLE Printers (
  PrinterID INT NOT NULL AUTO_INCREMENT,
  Name VARCHAR(25) NOT NULL,
  ImageID INT NOT NULL,
  RoomID INT NOT NULL,
  CONSTRAINT PK_Printers PRIMARY KEY(PrinterID),
  CONSTRAINT FK_Printers_ImageID FOREIGN KEY(ImageID) REFERENCES Images(ImageID),
  CONSTRAINT FK_Printers_RoomID FOREIGN KEY(RoomID) REFERENCES Rooms(RoomID),
  CONSTRAINT U_RoomID UNIQUE(RoomID)
) Engine = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin;

CREATE TABLE AdjacentBuildings(
  BuildingID INT NOT NULL,
  AdjacentBuildingID INT NOT NULL,
  CONSTRAINT PK_AdjacentBuildings PRIMARY KEY(BuildingID, AdjacentBuildingID),
  CONSTRAINT FK_AdjacentBuildings_Building FOREIGN KEY(BuildingID) REFERENCES Buildings(BuildingID),
  CONSTRAINT FK_AdjacentBuildings_AdjacentBuilding FOREIGN KEY(AdjacentBuildingID) REFERENCES Buildings(BuildingID)
) Engine = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin;

CREATE TABLE PlayerItems(
  PlayerID INT NOT NULL,
  ItemID INT NOT NULL,
  CONSTRAINT PK_PlayerItems PRIMARY KEY(PlayerID, ItemID),
  CONSTRAINT FK_PlayerItems_PlayerID FOREIGN KEY(PlayerID) REFERENCES Players(PlayerID),
  CONSTRAINT FK_PlayerItems_ItemID FOREIGN KEY(ItemID) REFERENCES Items(ItemID)
) Engine = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin;

CREATE TABLE Visits(
  PlayerID INT NOT NULL,
  PrinterID INT NOT NULL,
  CONSTRAINT PK_Visits PRIMARY KEY(PlayerID, PrinterID),
  CONSTRAINT FK_Visits_PlayerID FOREIGN KEY(PlayerID) REFERENCES Players(PlayerID),
  CONSTRAINT FK_VIsits_PrinterID FOREIGN KEY(PrinterID) REFERENCES Printers(PrinterID)
) Engine = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin;


CREATE TABLE People(
  PersonID INT NOT NULL AUTO_INCREMENT,
  FName VARCHAR(25) NOT NULL,
  LName VARCHAR(25) NOT NULL,
  DialogueID INT NOT NULL,
  ItemID INT NOT NULL,
  PrinterID INT NOT NULL,
  PictureID INT NOT NULL,
  CONSTRAINT PK_People PRIMARY KEY(PersonID),
  CONSTRAINT FK_People_DialogueID FOREIGN KEY(DialogueID) REFERENCES DialogueOptions(DialogueID),
  CONSTRAINT FK_People_PrinterID FOREIGN KEY(PrinterID) REFERENCES Printers(PrinterID),
  CONSTRAINT FK_People_ItemID FOREIGN KEY(ItemID) REFERENCES Items(ItemID),
  CONSTRAINT FK_People_PictureID FOREIGN KEY(PictureID) REFERENCES Images(ImageID)
) Engine = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin;

CREATE TABLE RoomPeople(
  RoomID INT NOT NULL,
  PersonID INT NOT NULL,
  CONSTRAINT PK_RoomPeople PRIMARY KEY(RoomID, PersonID),
  CONSTRAINT FK_RoomPeople_RoomID FOREIGN KEY(RoomID) REFERENCES Rooms(RoomID),
  CONSTRAINT FK_RoomPeople_PersonID FOREIGN KEY(PersonID) REFERENCES People(PersonID),
  CONSTRAINT U_RoomPeople_PersonID UNIQUE (PersonID)
) Engine = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin;

CREATE TABLE WillTakeItem(
  PersonID INT NOT NULL,
  ItemID INT NOT NULL,
  RoomID INT,
  DialogueID INT NOT NULL,
  CONSTRAINT PK_WillTakeItem PRIMARY KEY(PersonID, ItemID),
  CONSTRAINT FK_WillTakeItem_PersonID FOREIGN KEY(PersonID) REFERENCES People(PersonID),
  CONSTRAINT FK_WillTakeItem_ItemID FOREIGN KEY(ItemID) REFERENCES Items(ItemID),
  CONSTRAINT FK_WillTakeItem_RoomID FOREIGN KEY(RoomID) REFERENCES Rooms(RoomID),
  CONSTRAINT FK_WillTakeItem_DialogueID FOREIGN KEY(DialogueID) REFERENCES DialogueOptions(DialogueID)
 -- CONSTRAINT U_RoomID UNIQUE(RoomID)
) Engine = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin;

CREATE TABLE Gives(
  PlayerID INT NOT NULL,
  ItemID INT NOT NULL,
  PersonID INT NOT NULL,
  CONSTRAINT PK_Gives PRIMARY KEY(PlayerID, ItemID, PersonID),
  CONSTRAINT FK_Gives_ItemID FOREIGN KEY(ItemID) REFERENCES Items(ItemID),
  CONSTRAINT FK_Gives_PersonID FOREIGN KEY(PersonID) REFERENCES People(PersonID)
) Engine = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin;

CREATE TABLE Ranks(
  RankID INT NOT NULL AUTO_INCREMENT,
  Rank VARCHAR(25) NOT NULL,
  CONSTRAINT PK_Rank PRIMARY KEY(RankID)
) Engine = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin;

CREATE TABLE Students(
  StudentID INT NOT NULL,
  RankID INT NOT NULL,
  CONSTRAINT PK_Students PRIMARY KEY(StudentID),
  CONSTRAINT FK_Students_PersonID FOREIGN KEY(StudentID) REFERENCES People(PersonID),
  CONSTRAINT FK_Students_RankID FOREIGN KEY(RankID) REFERENCES Ranks(RankID)
) Engine = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin;

CREATE TABLE Professors(
  ProfID INT NOT NULL AUTO_INCREMENT,
  CONSTRAINT PK_Professors PRIMARY KEY(ProfID),
  CONSTRAINT FK_Professors_PersonID FOREIGN KEY(ProfID) REFERENCES People(PersonID)
) Engine = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin;

CREATE TABLE Assignments(
  AssignmentID INT NOT NULL AUTO_INCREMENT,
  AssignmentNumber INT NOT NULL,
  Title VARCHAR(25) NOT NULL,
  DueDate DATE NOT NULL,
  CONSTRAINT PK_Assignment PRIMARY KEY(AssignmentID),
  CONSTRAINT U_AssignmentNumber UNIQUE(AssignmentNumber)
) Engine = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin;

CREATE TABLE Classes(
  ClassID INT NOT NULL AUTO_INCREMENT,
  Name VARCHAR(35) NOT NULL,
  RoomID INT NOT NULL,
  ProfID INT NOT NULL,
  AssignmentID INT NOT NULL,
  CONSTRAINT PK_Classes PRIMARY KEY(ClassID),
  CONSTRAINT FK_Classes_ProfID FOREIGN KEY(ProfID) REFERENCES Professors(ProfID),
  CONSTRAINT FK_Classes_AssignmentID FOREIGN KEY(AssignmentID) REFERENCES Assignments(AssignmentID),
  CONSTRAINT FK_Classes_RoomID FOREIGN KEY(RoomID) REFERENCES Rooms(RoomID),
  CONSTRAINT U_RoomID UNIQUE(RoomID)
) Engine = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin;
