<?php
/**
 * @name IndexController
 * @author Administrator
 * @desc 默认控制器
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
class IndexController extends Yaf_Controller_Abstract {

	/** 
     * 默认动作
     * Yaf支持直接把Yaf_Request_Abstract::getParam()得到的同名参数作为Action的形参
     * 对于如下的例子, 当访问http://yourhost/sample/index/index/index/name/Administrator 的时候, 你就会发现不同
     */
	public function indexAction($name = "Stranger") {
		//1. fetch query
		$get = $this->getRequest()->getQuery("get", "default value");

		//2. fetch model
		$model = new UserModel();

		//3. assign
		$this->getView()->assign("content", $model->selectSample());
		$this->getView()->assign("name", $name);

		//4. render by Yaf, 如果这里返回FALSE, Yaf将不会调用自动视图引擎Render模板
        return TRUE;
	}

	public function insertAction(){

		$text = "作者：陈小惜
链接：https://zhuanlan.zhihu.com/p/24242019
来源：知乎
著作权归作者所有，转载请联系作者获得授权。

文/猫司令

他们喜欢在灯光熄灭以后入场。借着广告喧闹的荧光和缤纷的声响，要在消费主义闪烁的霓虹中找到座位，就像在茫茫的大海中划船，必须经过无数次大腿和膝盖的摩擦，才能顺利在开场前手舞足蹈的人群中找到一席之地。大腿是自己的，膝盖是已经落座那些人的。


她早就发现电影是一种宗教，但凡能让一群人自觉自愿地统一行动，正襟危坐，全情投入，神魂颠倒的，都可以称之为宗教。爱情当然也是。所以她始终怀疑他们之间的反应有多少爱的成分。那是一种模棱两可的感情，经过了权衡和判断，却选择了最危险的做法，这其中包含了许多矛盾和不可告人的秘密，却又和这世界上的大部分感情没什么不同，因为它涉及了一个男人和一个女人。


她总是坐在他的右边，因为她习惯于向左靠。这样特殊的场合，交谈显然是不必要的，但也不是完全免除了沟通。当她把胳膊自然地插进他的怀抱中时，他小声对她说了一个字：“热。”，带着戏谑的微笑，身子却微微向她倾斜了一点，以至于两个人几乎要互相倚靠着了。但毕竟是她主动的，而且她肩膀小，应当是她靠他。于是她顺理成章地扭过了胯，像一条安静的藤蔓一样缠绕住了他的腰，膝盖搭在他的大腿上。电影院的扶手是可以抬上去的，于是两个椅子变成了一个，两个身体变成了一个。


这样的姿势不能说舒服，但她觉得很值得，她终于能享有他了。他温暖的体温，身上干净的，过分礼貌与克制的味道，还有他的那一双修长而有力的大手，那是他身体上最性感的部分。此刻它们正紧紧地抓住她的一只手腕，以防她在他身上胡乱摸索。她的摸索总是有挑逗意味的，通常开始于电影的第一个高潮以后，这笼统的抓也是情趣的，半推半就，欲拒还迎的，使她的手停留在他身体的一个特别的位置。隔着衣服，她感觉到他跳动的肉体，随着呼吸而起伏，遇到电影里好笑的部分，起伏就变得格外紧凑，像夏天的风吹过层层麦浪，落在鸟的羽毛上。



如果说外面那个白色的明亮世界是现实，那么夜晚就是她的第一层梦境，灯红酒绿的城市，声色犬马的夜生活，是现实生活的倒影；电影院则是她的第二层梦境，人们终于卸下社会身份，成为一个单纯的观众，不再关心周围的鸡毛蒜皮和伦理道德，自愿走入这个与世隔绝的境地；而电影本身，是她的第三层梦境，这个梦不管是喜是悲，总是虚构的，浪漫到底的，同时也有它实打实的一面，最离奇的故事到最后也是在讲人性。三重梦境一个套着一个，一层裹着一层，简直是一部《盗梦空间》了。


她想起来，连那部片子都是他们一起看的。记不清是几年前了，在四通桥东，双安商场对面的华星。空调凉得瘆人，她不得不整个身体缩在他的臂弯中，头枕着他的肩膀。她记得那天他穿了一件旧得很得体的白T恤，右边的领口被她的粉底蹭上了一小块突兀的肉色。这污渍让她感觉安心，那是她的旋转陀螺，用来从梦境中标记出现实的。她还记得散场以后，他们在影院后面的一家饭店吃了两碗云南米线。店里的甜米酒很好喝，碗里漂浮着橘红色的枸杞，像古代艺妓的朱唇。饭店门口有一个老大爷坐在小马扎上卖盗版光盘，摇晃的蒲扇勾起了她幼时回忆里的夏天。
她总是记得这些无关紧要的细节，电影却彻底忘得一干二净了。那些和他在一起的细节。他们的关系到底是不伦的，不然也不会专挑这种黑暗的场合幽会。而这个世界上的美，又有多少是合伦的呢。真的循规蹈矩，按部就班，伦理之内的事情，就谈不上喜欢或者不喜欢了，终究要变成正当生活的一部分，日食夜寐，一饭一蔬，是毫无悬念的平乏。并不是说实在的东西就一定不可爱，只是她没有，于是索性就不要了，反而落得个心安理得。她早就知道，她这种人是不配拥有实的，生活里的一切都是虚，和电影一样，是正当生活的映像。在这种生活中过久了，连人生观都颠倒过来，仿佛在海底的宫殿中生活的人，他们纸醉金迷，拥有一切辉煌的幻影，偶尔冒到水面上来，看见真正的明和暗，感受到真正的风和声，便立刻头晕眼花，丧失了清醒，如同陆地上的人跌倒水里去一样。
她抬起手腕，将他的手拿到自己的鼻尖下，贪婪地嗅着他手上的气味。淡淡的烟味，除此之外一无所获。她张开双唇，轻轻地，温柔地吮了一下他的手指，湿润的舌头在指尖一扫而过，像一条鳗鱼划过河面。他下意识地想抽回手，她却紧紧抓住了他，如同一个孩子紧紧拥抱着一只挣扎的雀儿。从前，她从来没觉得那白昼里的现实生活有什么好处，她年轻，跋扈，放荡不羁。但是现在不同了，她有了他。一个在她密不透风的水底生活上开了一扇天窗的人。如今光照进来了，在她的湖心投下了一道忽明忽暗的波影，使她局促的生活拥有了一个惊人的秘密。



这下她全看见了，听见了，这世界上的一切光影和声音。她注意到地铁上的妈妈攥着孩子的小手，她听见麦当劳里的邻座讨论简历和实习，她听见汽车突突突的尾气像一头老牛，她看见放学的孩子们踩着五颜六色的运动鞋飞奔过胡同。仿佛一夜之间，她长大了，开了心窍，突然明白了世界上的许多微不足道的事实，其中一条就是她对他的感情。她拥有了真正的欢喜，不同于那些漂亮的鞋子和首饰的享受，比实物更实，比虚构还虚。有些人管它叫爱情。


电影结束了，灯光亮了起来。他们的肢体各归各位，如同两个陌生的旅客。离开的时候，她回头去看放映室的舷窗，那个曾经有无数流光溢彩的瞬间发射出来的地方，此刻却黯淡无光，像一座悬挂在墙壁上的钟表。她没有犹豫，快步走出了电影院。

_________________________
主编｜周祚

责编｜派派


猫司令：无业游民，现居纽约。";

		$question = new QuestionModel();
		for($i=0;$i<10000;$i++){
			$data['title'] = $data['note'] = "";
			for($j=0;$j<mt_rand(20,80);$j++){
				$data['title'].= mb_substr($text,mt_rand(0, mb_strlen($text,"utf8") - 1),1,"utf8");
			}
			for($j=0;$j<mt_rand(50,120);$j++){
				$data['note'].= mb_substr($text,mt_rand(0, mb_strlen($text,"utf8") - 1),1,"utf8");
			}
			$question->insertData($data);
		}

		return false;
	}


	public function insertbikeAction(){
		$database['database_type'] = "mysql";
		$database['server'] = "191.101.152.31";
		$database['port'] = "3306";
		$database['database_name'] = "mybike";
		$database['username'] = "root";
		$database['password'] = "root";
		$database['prefix'] = "b_";
		$database['charset'] = "UTF8";

		$model = new QuestionModel($database);
		$data['price'] = 600;
		$data['type'] = 1;
		for($i=0;$i<10000;$i++){
			$data['lat'] = mt_rand(305680,307720) / 10000;
			$data['lon'] = mt_rand(1040000,1042620) / 10000;
			$model->insert("bikes",$data);
		}
		return false;
	}

	public function getbikeAction(){
		$lat = $_GET['lat'];
		$lon = $_GET['lon'];
		$database['database_type'] = "mysql";
		$database['server'] = "191.101.152.31";
		$database['port'] = "3306";
		$database['database_name'] = "mybike";
		$database['username'] = "root";
		$database['password'] = "root";
		$database['prefix'] = "b_";
		$database['charset'] = "UTF8";

		$model = new QuestionModel($database);
		if(!empty($lat) && !empty($lon)){
			$res = $model->query("select * from b_bikes order by ACOS(SIN(({$lat} * 3.1415) / 180 ) *SIN((lat * 3.1415) / 180 )
			 +COS(({$lat} * 3.1415) / 180 ) * COS((lat * 3.1415) / 180 ) *COS(({$lon} * 3.1415) / 180 - (lon * 3.1415) / 180 ) ) * 6380 asc limit 1000");
			$data['result'] = 1;
			$data['bikeData'] = $res;
			echo json_encode($data);
		}
		return false;
	}
}
