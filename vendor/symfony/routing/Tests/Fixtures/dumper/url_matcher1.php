<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * ProjectUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class ProjectUrlMatcher extends Symfony\Component\Routing\Matcher\UrlMatcher
{

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }


    public function match($pathinfo)
    {
        $allow    = [ ];
        $pathinfo = rawurldecode($pathinfo);
        $context  = $this->context;
        $request  = $this->request;

        // foo
        if (0 === strpos($pathinfo, '/foo') && preg_match('#^/foo/(?P<bar>baz|symfony)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, [ '_route' => 'foo' ]), [ 'def' => 'test', ]);
        }

        if (0 === strpos($pathinfo, '/bar')) {
            // bar
            if (preg_match('#^/bar/(?P<foo>[^/]++)$#s', $pathinfo, $matches)) {
                if ( ! in_array($this->context->getMethod(), [ 'GET', 'HEAD' ])) {
                    $allow = array_merge($allow, [ 'GET', 'HEAD' ]);
                    goto not_bar;
                }

                return $this->mergeDefaults(array_replace($matches, [ '_route' => 'bar' ]), [ ]);
            }
            not_bar:

            // barhead
            if (0 === strpos($pathinfo, '/barhead') && preg_match('#^/barhead/(?P<foo>[^/]++)$#s', $pathinfo,
                    $matches)
            ) {
                if ( ! in_array($this->context->getMethod(), [ 'GET', 'HEAD' ])) {
                    $allow = array_merge($allow, [ 'GET', 'HEAD' ]);
                    goto not_barhead;
                }

                return $this->mergeDefaults(array_replace($matches, [ '_route' => 'barhead' ]), [ ]);
            }
            not_barhead:

        }

        if (0 === strpos($pathinfo, '/test')) {
            if (0 === strpos($pathinfo, '/test/baz')) {
                // baz
                if ($pathinfo === '/test/baz') {
                    return [ '_route' => 'baz' ];
                }

                // baz2
                if ($pathinfo === '/test/baz.html') {
                    return [ '_route' => 'baz2' ];
                }

                // baz3
                if ($pathinfo === '/test/baz3/') {
                    return [ '_route' => 'baz3' ];
                }

            }

            // baz4
            if (preg_match('#^/test/(?P<foo>[^/]++)/$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, [ '_route' => 'baz4' ]), [ ]);
            }

            // baz5
            if (preg_match('#^/test/(?P<foo>[^/]++)/$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_baz5;
                }

                return $this->mergeDefaults(array_replace($matches, [ '_route' => 'baz5' ]), [ ]);
            }
            not_baz5:

            // baz.baz6
            if (preg_match('#^/test/(?P<foo>[^/]++)/$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_bazbaz6;
                }

                return $this->mergeDefaults(array_replace($matches, [ '_route' => 'baz.baz6' ]), [ ]);
            }
            not_bazbaz6:

        }

        // foofoo
        if ($pathinfo === '/foofoo') {
            return [ 'def' => 'test', '_route' => 'foofoo', ];
        }

        // quoter
        if (preg_match('#^/(?P<quoter>[\']+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, [ '_route' => 'quoter' ]), [ ]);
        }

        // space
        if ($pathinfo === '/spa ce') {
            return [ '_route' => 'space' ];
        }

        if (0 === strpos($pathinfo, '/a')) {
            if (0 === strpos($pathinfo, '/a/b\'b')) {
                // foo1
                if (preg_match('#^/a/b\'b/(?P<foo>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, [ '_route' => 'foo1' ]), [ ]);
                }

                // bar1
                if (preg_match('#^/a/b\'b/(?P<bar>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, [ '_route' => 'bar1' ]), [ ]);
                }

            }

            // overridden
            if (preg_match('#^/a/(?P<var>.*)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, [ '_route' => 'overridden' ]), [ ]);
            }

            if (0 === strpos($pathinfo, '/a/b\'b')) {
                // foo2
                if (preg_match('#^/a/b\'b/(?P<foo1>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, [ '_route' => 'foo2' ]), [ ]);
                }

                // bar2
                if (preg_match('#^/a/b\'b/(?P<bar1>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, [ '_route' => 'bar2' ]), [ ]);
                }

            }

        }

        if (0 === strpos($pathinfo, '/multi')) {
            // helloWorld
            if (0 === strpos($pathinfo, '/multi/hello') && preg_match('#^/multi/hello(?:/(?P<who>[^/]++))?$#s',
                    $pathinfo, $matches)
            ) {
                return $this->mergeDefaults(array_replace($matches, [ '_route' => 'helloWorld' ]),
                    [ 'who' => 'World!', ]);
            }

            // overridden2
            if ($pathinfo === '/multi/new') {
                return [ '_route' => 'overridden2' ];
            }

            // hey
            if ($pathinfo === '/multi/hey/') {
                return [ '_route' => 'hey' ];
            }

        }

        // foo3
        if (preg_match('#^/(?P<_locale>[^/]++)/b/(?P<foo>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, [ '_route' => 'foo3' ]), [ ]);
        }

        // bar3
        if (preg_match('#^/(?P<_locale>[^/]++)/b/(?P<bar>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, [ '_route' => 'bar3' ]), [ ]);
        }

        if (0 === strpos($pathinfo, '/aba')) {
            // ababa
            if ($pathinfo === '/ababa') {
                return [ '_route' => 'ababa' ];
            }

            // foo4
            if (preg_match('#^/aba/(?P<foo>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, [ '_route' => 'foo4' ]), [ ]);
            }

        }

        $host = $this->context->getHost();

        if (preg_match('#^a\\.example\\.com$#si', $host, $hostMatches)) {
            // route1
            if ($pathinfo === '/route1') {
                return [ '_route' => 'route1' ];
            }

            // route2
            if ($pathinfo === '/c2/route2') {
                return [ '_route' => 'route2' ];
            }

        }

        if (preg_match('#^b\\.example\\.com$#si', $host, $hostMatches)) {
            // route3
            if ($pathinfo === '/c2/route3') {
                return [ '_route' => 'route3' ];
            }

        }

        if (preg_match('#^a\\.example\\.com$#si', $host, $hostMatches)) {
            // route4
            if ($pathinfo === '/route4') {
                return [ '_route' => 'route4' ];
            }

        }

        if (preg_match('#^c\\.example\\.com$#si', $host, $hostMatches)) {
            // route5
            if ($pathinfo === '/route5') {
                return [ '_route' => 'route5' ];
            }

        }

        // route6
        if ($pathinfo === '/route6') {
            return [ '_route' => 'route6' ];
        }

        if (preg_match('#^(?P<var1>[^\\.]++)\\.example\\.com$#si', $host, $hostMatches)) {
            if (0 === strpos($pathinfo, '/route1')) {
                // route11
                if ($pathinfo === '/route11') {
                    return $this->mergeDefaults(array_replace($hostMatches, [ '_route' => 'route11' ]), [ ]);
                }

                // route12
                if ($pathinfo === '/route12') {
                    return $this->mergeDefaults(array_replace($hostMatches, [ '_route' => 'route12' ]),
                        [ 'var1' => 'val', ]);
                }

                // route13
                if (0 === strpos($pathinfo, '/route13') && preg_match('#^/route13/(?P<name>[^/]++)$#s', $pathinfo,
                        $matches)
                ) {
                    return $this->mergeDefaults(array_replace($hostMatches, $matches, [ '_route' => 'route13' ]), [ ]);
                }

                // route14
                if (0 === strpos($pathinfo, '/route14') && preg_match('#^/route14/(?P<name>[^/]++)$#s', $pathinfo,
                        $matches)
                ) {
                    return $this->mergeDefaults(array_replace($hostMatches, $matches, [ '_route' => 'route14' ]),
                        [ 'var1' => 'val', ]);
                }

            }

        }

        if (preg_match('#^c\\.example\\.com$#si', $host, $hostMatches)) {
            // route15
            if (0 === strpos($pathinfo, '/route15') && preg_match('#^/route15/(?P<name>[^/]++)$#s', $pathinfo,
                    $matches)
            ) {
                return $this->mergeDefaults(array_replace($matches, [ '_route' => 'route15' ]), [ ]);
            }

        }

        if (0 === strpos($pathinfo, '/route1')) {
            // route16
            if (0 === strpos($pathinfo, '/route16') && preg_match('#^/route16/(?P<name>[^/]++)$#s', $pathinfo,
                    $matches)
            ) {
                return $this->mergeDefaults(array_replace($matches, [ '_route' => 'route16' ]), [ 'var1' => 'val', ]);
            }

            // route17
            if ($pathinfo === '/route17') {
                return [ '_route' => 'route17' ];
            }

        }

        if (0 === strpos($pathinfo, '/a')) {
            // a
            if ($pathinfo === '/a/a...') {
                return [ '_route' => 'a' ];
            }

            if (0 === strpos($pathinfo, '/a/b')) {
                // b
                if (preg_match('#^/a/b/(?P<var>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, [ '_route' => 'b' ]), [ ]);
                }

                // c
                if (0 === strpos($pathinfo, '/a/b/c') && preg_match('#^/a/b/c/(?P<var>[^/]++)$#s', $pathinfo,
                        $matches)
                ) {
                    return $this->mergeDefaults(array_replace($matches, [ '_route' => 'c' ]), [ ]);
                }

            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
