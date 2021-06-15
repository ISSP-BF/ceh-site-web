
<?php
  $url = 'https://doc-08-40-docs.googleusercontent.com/docs/securesc/2nf62217ja7kk2ah27udaqt0v10g88bt/bnar9k1ld8do6gm4tbae01ql8r60a1un/1620484575000/08580795219892167615/08580795219892167615/1rkxw4K4FfmUsydv4U$

  $url = 'https://doc-08-40-docs.googleusercontent.com/docs/securesc/2nf62217ja7kk2ah27udaqt0v10g88bt/22sa0o9dnj0urjv1huoiocbcss4k2i52/1620486000000/08580795219892167615/08580795219892167615/1rkxw4K4FfmUsydv4U$

    downloadDistantFile($url,'data/data');
/**
 * Copy remote file over HTTP one small chunk at a time.
 *
 * @param $infile The full URL to the remote file
 * @param $outfile The path where to save the file
 */
  function downloadDistantFile($url, $dest)
  {
    $options = array(
      CURLOPT_FILE => is_resource($dest) ? $dest : fopen($dest, 'w'),
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_URL => $url,
      CURLOPT_FAILONERROR => true, // HTTP code > 400 will throw curl error
    );

    $ch = curl_init();
    curl_setopt_array($ch, $options);
    $return = curl_exec($ch);

    if ($return === false)
    {
      return curl_error($ch);
    }
    else
    {
      return true;
    }
  }
?>

