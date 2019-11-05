CREATE TABLE Users (
  UserID INT NOT NULL AUTO_INCREMENT,
  Username VARCHAR(25) NOT NULL,
  Password VARBINARY(25) NOT NULL,
  Salt VARBINARY(25) NOT NULL,
  CreatedOn DATE NOT NULL,
  CONSTRAINT PK_Users PRIMARY KEY(UserID)
);

CREATE TABLE Players (
  PlayerID INT NOT NULL AUTO_INCREMENT,
  CharacterName VARCHAR(25) NOT NULL,
  Score INT NOT NULL,
  UserID INT NOT NULL,
  CONSTRAINT PK_Players PRIMARY KEY(PlayerID),
  CONSTRAINT FK_Players_UserID FOREIGN KEY(UserID) REFERENCES Users(UserID)
);

CREATE TABLE Images (
  ImageID INT NOT NULL AUTO_INCREMENT,
  Image BLOB NOT NULL,
  Type VARCHAR(25) NOT NULL,
  CONSTRAINT PK_Images PRIMARY KEY (ImageID)
);

CREATE TABLE DialogueOptions (
  DialogueID INT NOT NULL AUTO_INCREMENT,
  Phrase LONGTEXT NOT NULL,
  CONSTRAINT PK_DialogueOptions PRIMARY KEY (DialogueID)
);

CREATE TABLE Items (
  ItemID INT NOT NULL AUTO_INCREMENT,
  Name VARCHAR(25) NOT NULL,
  Weight INT NOT NULL,
  ImageID INT NOT NULL,
  ItemHintID INT NOT NULL,
  CONSTRAINT PK_Items PRIMARY KEY(ItemID),
  CONSTRAINT FK_Items_Images FOREIGN KEY(ImageID) REFERENCES Images(ImageID),
  CONSTRAINT FK_Items_Hint FOREIGN KEY(ItemHintID) REFERENCES DialogueOptions(DialogueID)
);

CREATE TABLE Buildings(
  BuildingID INT NOT NULL AUTO_INCREMENT,
  Name VARCHAR(25) NOT NULL,
  CONSTRAINT PK_Buildings PRIMARY KEY(BuildingID),
  CONSTRAINT U_Name UNIQUE(Name)
);

CREATE TABLE Rooms (
  RoomID INT NOT NULL AUTO_INCREMENT,
  Number VARCHAR NOT NULL,
  BuildingID INT NOT NULL,
  CONSTRAINT PK_Rooms PRIMARY KEY(RoomID),
  CONSTRAINT FK_Rooms_Buildings FOREIGN KEY(BuildingID) REFERENCES Buildings(BuildingID)
);

CREATE TABLE RoomItems(
  RoomID INT NOT NULL,
  ItemID INT NOT NULL,
  CONSTRAINT PK_RoomItems PRIMARY KEY(RoomID, ItemID),
  CONSTRAINT FK_RoomItems_RoomID FOREIGN KEY(RoomID) REFERENCES Rooms(RoomID),
  CONSTRAINT FK_RoomItems_ItemID FOREIGN KEY(ItemID) REFERENCES Items(ItemID)
);

CREATE TABLE Printers (
  PrinterID INT NOT NULL AUTO_INCREMENT,
  Name VARCHAR(25) NOT NULL,
  ImageID INT NOT NULL,
  RoomID INT NOT NULL,
  CONSTRAINT PK_Printers PRIMARY KEY(PrinterID),
  CONSTRAINT FK_Printers_ImageID FOREIGN KEY(ImageID) REFERENCES Images(ImageID),
  CONSTRAINT FK_Printers_RoomID FOREIGN KEY(RoomID) REFERENCES Rooms(RoomID)
);

CREATE TABLE AdjacentBuildings(
  BuildingID INT NOT NULL,
  AdjacentBuildingID INT NOT NULL,
  CONSTRAINT PK_AdjacentBuildings PRIMARY KEY(BuildingID, AdjacentBuildingID),
  CONSTRAINT FK_AdjacentBuildings_Building FOREIGN KEY(BuildingID) REFERENCES Buildings(BuildingID),
  CONSTRAINT FK_AdjacentBuildings_AdjacentBuilding FOREIGN KEY(AdjacentBuildingID) REFERENCES Buildings(BuildingID)
);

CREATE TABLE PlayerItems(
  PlayerID INT NOT NULL,
  ItemID INT NOT NULL,
  CONSTRAINT PK_PlayerItems PRIMARY KEY(PlayerID, ItemID),
  CONSTRAINT FK_PlayerItems_PlayerID FOREIGN KEY(PlayerID) REFERENCES Players(PlayerID),
  CONSTRAINT FK_PlayerItems_ItemID FOREIGN KEY(ItemID) REFERENCES Items(ItemID)
);
