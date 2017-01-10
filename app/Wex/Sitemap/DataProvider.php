<?php namespace Wex\Sitemap;

use App\Repositories\TagRepositoryEloquent;
use App\Repositories\WxappRepositoryEloquent;
use App\Repositories\WxappTagRepositoryEloquent;
use Illuminate\Routing\UrlGenerator;


class DataProvider
{
    /**
     * The URL generator instance.
     *
     * @var \Illuminate\Routing\UrlGenerator
     */
    protected $url;

    protected $wxappRepository;
    protected $tagRepository;

    /**
     * Create a new data provider instance.
     * DataProvider constructor.
     * @param UrlGenerator $url
     * @param WxappRepositoryEloquent $wxappRepository
     * @param WxappTagRepositoryEloquent $tagRepository
     */
    public function __construct(
        UrlGenerator $url,
        WxappRepositoryEloquent $wxappRepository,
        TagRepositoryEloquent $tagRepository)
    {
        $this->url    = $url;
        $this->wxappRepository = $wxappRepository;
        $this->tagRepository  = $tagRepository;
    }

    /**
     * Get all the topic to include in the sitemap.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Topic[]
     */
    public function getWxapps()
    {
        return $this->wxappRepository->orderBy('created_at', 'desc')->all();
    }

    /**
     * Get the url for the given topic.
     * @param $wxapp
     * @return string
     */
    public function getWxappUrl($wxapp)
    {
        return $this->url->route('detail', $wxapp->id);
    }

    /**
     * Get all the Categories to include in the sitemap.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Category[]
     */
    public function getTags()
    {
        return $this->tagRepository->orderBy('created_at', 'desc')->all();
    }

    public function getTagUrl($tag)
    {
        return $this->url->route('tag', $tag->id);
    }

    /**
     * Get all the static pages to include in the sitemap.
     *
     * @return array
     */
    public function getStaticPages()
    {
        $static = [];

        $static[] = $this->getPage('index', 'daily', '1.0');

        return $static;
    }

    /**
     * Get the data for the given page.
     *
     * @param  string  $route
     * @param  string  $freq
     * @param  string  $priority
     * @return array
     */
    protected function getPage($route, $freq, $priority)
    {
        $url = $this->url->route($route);

        return compact('url', 'freq', 'priority');
    }
}
