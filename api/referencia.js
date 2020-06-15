
        var videos = {"SUB":[{"server":"natsuki","title":"Natsuki","allow_mobile":true,"code":"https:\/\/s1.animeflv.net\/embed.php?s=natsuki&v=Q08xd09qZmc5Mmo0V3BOWldERkhxWVcxNmJ2VUdCdEtOWkw4amw3eVY1NG9GSWV5RVBqNXVFamZic0ZPNkk1czhFYWkySWJVNUJnUHFrVFlBME1mSklsS0IvMXUxamt5MmxyYnZ2TUwxUmxIWDhta2VXc3RvZVJwQys5Ulp3YXowV3d2SG5mS21wRFlUZ0NZeXUxNjZBPT0="},
        
        {"server":"fembed","title":"Fembed","allow_mobile":true,"code":"https:\/\/embedsito.com\/v\/dk125hxj2p7qrzm"}
        
        
        ,{"server":"mega","title":"MEGA","url":"https:\/\/mega.nz\/#!P8h3xTAI!F9SlGTd4XCmG3FWoqcWBE5RtqCHV29RitJvZVvg5wBc","allow_mobile":true,"code":"https:\/\/mega.nz\/embed#!P8h3xTAI!F9SlGTd4XCmG3FWoqcWBE5RtqCHV29RitJvZVvg5wBc"},{"server":"okru","title":"Okru","allow_mobile":true,"code":"https:\/\/ok.ru\/videoembed\/1953640352428"},{"server":"yu","title":"YourUpload","allow_mobile":true,"code":"https:\/\/www.yourupload.com\/embed\/IKx58Opv1maf"},{"server":"maru","title":"Maru","allow_mobile":true,"code":"https:\/\/my.mail.ru\/video\/embed\/8995617145282895867#budyak.rus#8187"},{"server":"netu","title":"Netu","allow_mobile":true,"code":"https:\/\/hqq.tv\/player\/embed_player.php?vid=dUlXQ3lvTXJUYlNJcENtQ21SMEFHZz09"}]};
        $(document).ready(function() {
            initEpisode();

            $.getJSON("/kudasai.php", function( data ) {
                var items = '';
                $.each( data, function( key, val ) {
                    var pslug = 'https://somoskudasai.com/' + val.category.slug + '/' + val.slug + '/';
                    var cslug = 'https://somoskudasai.com/categoria/'+ val.category.slug +'/';

                    items += '<li><article class="NwBxCn"><a target="_blank" href="' + pslug + '"><figure><img src="' + val.image + '" alt=""><span>' + val.date + '</span></figure></a> <h3 class="Title"><a target="_blank" href="' + pslug + '">' + val.title + '</a></h3><a target="_blank" href="' + cslug + '" class="CatLnk">' + val.category.name + '</a></article></li>';
                });

                $('#Kudasai').append(items);
            });
        });
    