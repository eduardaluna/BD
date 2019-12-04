<?php
class Cripto
{
	public function setCripto($param)
	{
		return
			hash('sha512',
			hash('sha384',
			hash('whirlpool',
			hash('sha512',
			hash('sha384',
			hash('whirlpool',
			hash('sha256',
			md5(sha1('AegContabilAgoraEhNoizNasContabilidade18101vxnS72C93YkGOrexEOsRnJ5mKD0yxXy%BHd*IzLfeNVYr#Ntgznessapohabotaprafude5#GnWcIVue4*0PpvjFBV2oNFs0CqblhX1truoO*8zbOMnps1R8'.$param)))))))));
	}
}
