API en symfony crée par Thomas Le Scouarnec

##Liste des routes:
POST /event/create
    {
        "name": "Event Name",
        "beginDate": "2019-10-30 14:30",
        "endDate": "2019-11-01 15:30"
    }

PUT /event/edit/{eventid}
json exemple : 
    {
        "name": "Event Name",
        "beginDate": "2019-10-30 14:30",
        "endDate": "2019-11-01 15:30"
    }

DELETE /event/delete/{eventId}