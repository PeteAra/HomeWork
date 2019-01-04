-- Daniel Clark/Peter Arachtingi Final project Databases: Philosophy & Practice

USE Master

GO
IF NOT EXISTS (SELECT 1 FROM sys.databases WHERE name = 'MusicStore')
	BEGIN
		PRINT CONCAT('Creating MusicStore ', GETDATE());
		CREATE DATABASE MusicStore;
	END
ELSE
	BEGIN
		PRINT 'Database is created already, skipping recreation.'
	END



---Creation of 3 tables Artists, Albums and Songs
GO
USE MusicStore
GO
IF EXISTS (SELECT 1 FROM sys.databases WHERE name = 'MusicStore')
BEGIN
	IF NOT EXISTS (SELECT 1 FROM sysobjects WHERE name='Artists' AND xtype='U')
	BEGIN
		PRINT CONCAT('Creating TABLE Artists ', GETDATE());
		CREATE TABLE Artists
		(
			ArtistID INT NOT NULL IDENTITY PRIMARY KEY,
			ArtistName varchar(255) NOT NULL,
			ArtistLastName VARCHAR(255) NULL			
		)
		
	END
ELSE
	BEGIN
		PRINT 'TABLE ALREADY EXISTS! COMMAND HAS BEEN SKIPPED'
	END
END
--Creating Albums TABLE
IF EXISTS (SELECT 1 FROM sys.databases WHERE name = 'MusicStore')

BEGIN
	IF NOT EXISTS (SELECT 1 FROM sysobjects WHERE name='Albums' AND xtype='U')
	BEGIN
		PRINT concat('Creating TABLE Albums ', GETDATE());
		CREATE TABLE Albums
			(AlbumID INT NOT NULL IDENTITY,
			AlbumName varchar(155) NOT NULL,
			ReleaseYear varchar(255) NOT NULL)
	END
ELSE
	BEGIN
		PRINT 'TABLE ALREADY EXISTS! COMMAND HAS BEEN SKIPPED'
	END
END
--Creating Songs and written by


IF EXISTS (SELECT 1 FROM sys.databases WHERE name = 'MusicStore')

BEGIN
	IF NOT EXISTS (SELECT * FROM sysobjects WHERE name='Songs' AND xtype='U')
	BEGIN
		PRINT concat('Creating TABLE Songs ', GETDATE());
		CREATE TABLE Songs
			(SongID INT NOT NULL IDENTITY PRIMARY KEY,
			SongName varchar(155) NOT NULL,
			WrittenBy varchar(255) NOT NULL,
			WrittenBy1 varchar(255) NULL,
			WrittenBy2 varchar(255) NULL,
			WrittenBy3 varchar(255) NULL)

	END
ELSE
	BEGIN
		PRINT 'TABLE ALREADY EXISTS! COMMAND HAS BEEN SKIPPED'
	END
END



--Inserting Artist data into Table
--If else for eadch entry in case some how one of them is deleted, they are all reentered into database table.

SET IDENTITY_INSERT dbo.Artists ON
GO
IF NOT EXISTS
	(SELECT 1 FROM Artists 
	WHERE ArtistName = 'The Doobie Brothers')
	BEGIN
		INSERT INTO Artists (ArtistID,ArtistName, ArtistLastName)
		VALUES(1,'The Doobie Brothers', null)
	END
ELSE
	PRINT 'Data Already Entered';

IF NOT EXISTS
	(
	SELECT 1 FROM Artists 
	WHERE ArtistName = 'Boston')
	BEGIN
		INSERT INTO Artists (ArtistID,ArtistName, ArtistLastName)
		VALUES (2,'Boston', null)
	END
ELSE
	PRINT 'Data Already Entered';
	
IF NOT EXISTS
	(
	SELECT 1 FROM Artists 
	WHERE ArtistName = 'The Beatles')
	BEGIN
		INSERT INTO Artists (ArtistID,ArtistName, ArtistLastName)
		VALUES(3,'The Beatles', null)
	END
ELSE
	PRINT 'Data Already Entered';

IF NOT EXISTS
	(
	SELECT 1 FROM Artists 
	WHERE ArtistName = 'The Eagles')
	BEGIN
		INSERT INTO Artists (ArtistID,ArtistName, ArtistLastName)
		VALUES	(4,'The Eagles', null)
	END
ELSE
	PRINT 'Data Already Entered';

IF NOT EXISTS
	(
	SELECT 1 FROM Artists 
	WHERE ArtistName = 'The Hollies')
	BEGIN
		INSERT INTO Artists (ArtistID,ArtistName, ArtistLastName)
		VALUES	(5,'The Hollies', null)
	END
ELSE
	PRINT 'Data Already Entered';
SET IDENTITY_INSERT dbo.Artists OFF
GO

-- Insert Album Data into Table
SET IDENTITY_INSERT dbo.Albums ON
GO
IF NOT EXISTS 
	(
	SELECT 1 FROM Albums
	WHERE AlbumName = 'The Captain and Me'
	AND ReleaseYear = '1973')
	BEGIN 
		INSERT INTO Albums(AlbumID,AlbumName, ReleaseYear)
		VALUES (1,'The Captain and Me', '1973')
	END
ELSE
	PRINT 'Data Already Entered';

IF NOT EXISTS 
	(
	SELECT 1 FROM Albums
	WHERE AlbumName = 'Boston'
	AND ReleaseYear = '1976')
	BEGIN 
		INSERT INTO Albums(AlbumID,AlbumName, ReleaseYear)
		VALUES (2,'Boston', '1976')
	END
ELSE
	PRINT 'Data Already Entered';

IF NOT EXISTS 
	(
	SELECT 1 FROM Albums
	WHERE AlbumName = 'Let It Be'
	AND ReleaseYear = '1970')
	BEGIN 
		INSERT INTO Albums(AlbumID,AlbumName, ReleaseYear)
		VALUES (3,'Let It Be', '1970')
	END
ELSE
	PRINT 'Data Already Entered';
IF NOT EXISTS 
	(
	SELECT 1 FROM Albums
	WHERE AlbumName = 'The Long Run'
	AND ReleaseYear = '1979')
	BEGIN 
		INSERT INTO Albums(AlbumID,AlbumName, ReleaseYear)
		VALUES (4,'The Long Run', '1979')
	END
ELSE
	PRINT 'Data Already Entered';

IF NOT EXISTS 
	(
	SELECT 1 FROM Albums
	WHERE AlbumName = 'Look What We''ve Got'
	AND ReleaseYear = '1972')
	BEGIN 
		INSERT INTO Albums(AlbumID,AlbumName, ReleaseYear)
		VALUES (5,'Look What We''ve Got', '1972')
	END
ELSE
	PRINT 'Data Already Entered';
SET IDENTITY_INSERT dbo.Albums OFF
GO

	--Insert Song names into Song Table and who wrote them
SET IDENTITY_INSERT dbo.Songs ON
GO
IF NOT EXISTS 
	(
	SELECT 1 FROM Songs
	WHERE SongName = 'Long Train Runnin'''
	AND WrittenBy = 'Tom Johnston')
	BEGIN 
		INSERT INTO Songs(SongID,SongName, WrittenBy)
		VALUES (1,'Long Train Runnin''','Tom Johnston')
	END
ELSE
	PRINT 'Data Already Entered';

IF NOT EXISTS 
	(
	SELECT 1 FROM Songs
	WHERE SongName = 'Foreplay / Long Time'
	AND WrittenBy = 'Tom Scholz')
	BEGIN 
		INSERT INTO Songs(SongID,SongName, WrittenBy)
		VALUES (2,'Foreplay / Long Time','Tom Scholz')
	END
ELSE
	PRINT 'Data Already Entered';

IF NOT EXISTS 
	(
	SELECT 1 FROM Songs
	WHERE SongName = 'The Long and Winding Road'
	AND WrittenBy = 'John Lennon'
	AND WrittenBy1 = 'Paul McCartney')
	BEGIN 
		INSERT INTO Songs(SongID,SongName, WrittenBy, WrittenBy1)
		VALUES (3,'The Long and Winding Road','John Lennon','Paul McCartney')
	END
ELSE
	PRINT 'Data Already Entered';

IF NOT EXISTS 
	(
	SELECT 1 FROM Songs
	WHERE SongName = 'The Long Run'
	AND WrittenBy = 'Don Henley'
	AND WrittenBy1 = 'Glenn Fry')
	BEGIN 
		INSERT INTO Songs(SongID,SongName, WrittenBy, WrittenBy1)
		VALUES (4,'The Long Run','Don Henley','Glenn Fry')
	END
ELSE
	PRINT 'Data Already Entered';
	
IF NOT EXISTS 
	(
	SELECT 1 FROM Songs
	WHERE SongName = 'Long Cool Woman (In a Black Dress)'
	AND WrittenBy = 'Allan Clarke'
	AND WrittenBy1 = 'Roger Cook'
	AND WrittenBy2 = 'Roger Greenway')
	BEGIN 
		INSERT INTO Songs(SongID,SongName, WrittenBy, WrittenBy1,WrittenBy2)
		VALUES (5,'Long Cool Woman (In a Black Dress)','Allan Clarke','Roger Cook','Roger Greenway')
	END
ELSE
	PRINT 'Data Already Entered';
SET IDENTITY_INSERT dbo.Songs OFF
GO

--Add PK's and FK's to the tables
IF NOT EXISTS (SELECT 1 FROM sysobjects WHERE NAME ='FK_AlbumsArtist')
	BEGIN
		ALTER TABLE Albums
		ADD CONSTRAINT FK_AlbumsArtist FOREIGN KEY (AlbumID) REFERENCES Artists(ArtistID)
	END
ELSE
	PRINT 'FK Exists Already Skipping task!'

IF NOT EXISTS (SELECT 1 FROM sysobjects WHERE NAME ='FK_AlbumsSongs')
	BEGIN
		ALTER TABLE Albums
		ADD CONSTRAINT FK_AlbumsSongs FOREIGN KEY (AlbumID) REFERENCES Songs(SongID)
	END
ELSE
	PRINT 'FK Exists Already Skipping task!'

--Store Procedure Written by Peter for searching for All info by Song Name
IF OBJECT_ID(N'sp_GetBySong') IS NOT NULL
    DROP PROCEDURE dbo.sp_GetBySong
	PRINT'Dropping SP and Recreating'
GO
    CREATE PROC dbo.sp_GetBySong
        (
            @SongName VARCHAR(155))
        AS

        SELECT SongName, AlbumName, ArtistName,ReleaseYear, WrittenBy,WrittenBy1,WrittenBy2
        FROM [Songs] S
        JOIN Albums AL ON S.SongID = AL.AlbumID
        JOIN Artists A ON A.ArtistID = S.SongID
        WHERE SongName LIKE @SongName

GO

IF OBJECT_ID(N'sp_GetByArtist') IS NOT NULL
    DROP PROCEDURE [dbo].[sp_GetByArtist]
	PRINT 'Dropping SP and Recreating'
GO
    CREATE PROC [dbo].[sp_GetByArtist]
        (
            @ArtistName VARCHAR(155))
        AS
		
        SELECT ArtistName, SongName, AlbumName,ReleaseYear,WrittenBy, WrittenBy1, WrittenBy2
        FROM [Artists] A
        JOIN Albums AL ON A.ArtistID = AL.AlbumID
        JOIN Songs S ON S.SongID = A.ArtistID
        WHERE ArtistName LIKE @ArtistName
